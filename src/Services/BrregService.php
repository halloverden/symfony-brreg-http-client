<?php


namespace HalloVerden\BrregHttpClient\Services;


use Doctrine\Common\Collections\Collection;
use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Error\MalformedRequestResponse;
use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Error\ValidationError;
use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Organization;
use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\SearchResult;
use HalloVerden\BrregHttpClient\Interfaces\BrregServiceInterface;
use HalloVerden\HttpExceptions\BadGatewayException;
use HalloVerden\HttpExceptions\Http\HttpException;
use HalloVerden\HttpExceptions\Http\NotFoundHttpException;
use HalloVerden\HttpExceptions\InternalServerErrorException;
use HalloVerden\HttpExceptions\NoContentException;
use HalloVerden\HttpExceptions\Utility\ValidationException;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BrregService implements BrregServiceInterface {
  const API_UNAVAILABLE = 'BRREG_API_UNAVAILABLE';
  const NO_ORGANIZATION_FOUND = 'NO_ORGANIZATION_FOUND';
  const ORGANIZATION_GONE = 'ORGANIZATION_GONE';

  const BRREG_BASE_URI = 'https://data.brreg.no';

  const BRREG_UNIT_BY_ORGANIZATION_NUMBER_URL = '/enhetsregisteret/api/enheter/%s';
  const BRREG_SUBUNIT_BY_ORGANIZATION_NUMBER_URL = '/enhetsregisteret/api/underenheter/%s';

  const BRREG_UNIT_BY_ORGANIZATION_NAME_URL = '/enhetsregisteret/api/enheter';

  /**
   * @var HttpClientInterface
   */
  private $client;

  /**
   * @var SerializerInterface
   */
  private $serializer;

  /**
   * @var LoggerInterface
   */
  private $brregLogger;

  /**
   * BrregSearchService constructor.
   * @param HttpClientInterface $client
   * @param SerializerInterface $serializer
   * @param LoggerInterface $brregLogger
   */
  public function __construct(HttpClientInterface $client, SerializerInterface $serializer, LoggerInterface $brregLogger) {
    $this->client = $client;
    $this->serializer = $serializer;
    $this->brregLogger = $brregLogger;
  }

  /**
   * @param string $organizationNumber
   * @param bool   $fetchParentsIfPresent
   *
   * @return Organization
   */
  public function findOrganizationByOrganizationNumber(string $organizationNumber, bool $fetchParentsIfPresent = false): Organization {
    try {
      // try to find independent unit first
      $organization = $this->findUnitByOrganizationNumber($organizationNumber, $fetchParentsIfPresent);
    } catch (NotFoundHttpException $e) {
      // try to find subunit if no result was found
      $organization = $this->findUnitByOrganizationNumber($organizationNumber, $fetchParentsIfPresent, true);
    }
    return $organization;
  }

  /**
   * @param string     $organizationName
   * @param array|null $queryParams These params are additional query params that can be used to refine the search;
   * They are defined at https://data.brreg.no/enhetsregisteret/api/docs/index.html#enheter-sok-detaljer
   *
   * @return Collection
   */
  public function findOrganizationByOrganizationName(string $organizationName, array $queryParams = []): Collection {
    try {
      $queryParams['navn'] = $organizationName;

      $response = $this->client->request(Request::METHOD_GET, self::BRREG_UNIT_BY_ORGANIZATION_NAME_URL,
        [
          'base_uri' => self::BRREG_BASE_URI,
          'query' => $queryParams
        ]
      );
      switch ($response->getStatusCode()) {
        case Response::HTTP_NOT_FOUND:
          $this->brregLogger->info(sprintf('No organization found for name: %s',$organizationName));
          throw new NotFoundHttpException(self::NO_ORGANIZATION_FOUND);
        case Response::HTTP_OK:
          /** @var SearchResult $result */
          $result = $this->serializer->deserialize($response->getContent(false), SearchResult::class, 'json');
          if($result->getPage()->getTotalElements() < 1){
            throw new NoContentException();
          }
          return $result->getSearchedOrganizations()->getOrganizations();
        case Response::HTTP_BAD_REQUEST:
          /** @var MalformedRequestResponse $result */
          $result = $this->serializer->deserialize($response->getContent(false), MalformedRequestResponse::class, 'json');
          throw new ValidationException($this->fromValidationErrorsToViolationList($result), $result->getErrorMessage());
        default:
          $this->brregLogger->error(self::API_UNAVAILABLE, ['statusCode' => $response->getStatusCode()]);
          throw new InternalServerErrorException(self::API_UNAVAILABLE);
      }
    } catch (ExceptionInterface $e) {
      $this->brregLogger->error(self::API_UNAVAILABLE, ['exception' => $e]);
      throw new BadGatewayException(self::API_UNAVAILABLE, [
        'organizationName'    => $organizationName,
      ], $e);
    }
  }

  /**
   * @param string $organizationNumber
   * @param bool   $fetchParentsIfPresent
   * @param bool   $searchForSubunit
   *
   * @return Organization
   */
  private function findUnitByOrganizationNumber(string $organizationNumber, bool $fetchParentsIfPresent = false, bool $searchForSubunit = false): Organization {
    try {
      $response = $this->client->request(Request::METHOD_GET,
        sprintf($searchForSubunit ? self::BRREG_SUBUNIT_BY_ORGANIZATION_NUMBER_URL : self::BRREG_UNIT_BY_ORGANIZATION_NUMBER_URL, $organizationNumber),
        [ 'base_uri' => self::BRREG_BASE_URI]
      );
      switch ($response->getStatusCode()) {
        case Response::HTTP_NOT_FOUND:
          $this->brregLogger->info(sprintf('No organization found for organizationNumber: %s searchForSubunit: %s',$organizationNumber, $searchForSubunit));
          throw new NotFoundHttpException(self::NO_ORGANIZATION_FOUND);
        case Response::HTTP_OK:
          /** @var Organization $organization */
          $organization = $this->serializer->deserialize($response->getContent(false), Organization::class, 'json');
          if($fetchParentsIfPresent && $organization->getParentOrganizationNumber() !== null) {
            $organization->setParentOrganization($this->findOrganizationByOrganizationNumber($organization->getParentOrganizationNumber(), $fetchParentsIfPresent));
          }
          return $organization;
        case Response::HTTP_GONE:
          /** @var Organization $removedOrganization */
          $removedOrganization = $this->serializer->deserialize($response->getContent(false), Organization::class, 'json');
          throw new HttpException(Response::HTTP_GONE, self::ORGANIZATION_GONE, [
            'organizationNumber' => $removedOrganization->getOrganizationNumber(),
            'deletedAt' => $removedOrganization->getDeletedAt()
          ]);
        default:
          $this->brregLogger->error(self::API_UNAVAILABLE, ['statusCode' => $response->getStatusCode()]);
          throw new InternalServerErrorException(self::API_UNAVAILABLE);
      }
    } catch (ExceptionInterface $e) {
      $this->brregLogger->error(self::API_UNAVAILABLE, ['exception' => $e]);
      throw new BadGatewayException(self::API_UNAVAILABLE, [
        'organizationNumber'    => $organizationNumber,
        'fetchParentsIfPresent' => $fetchParentsIfPresent,
        'searchForSubunit'      => $searchForSubunit
      ], $e);
    }
  }

  private function fromValidationErrorsToViolationList(MalformedRequestResponse $malformedRequestResponse): ConstraintViolationListInterface {
    $violationList = new ConstraintViolationList();
    /** @var ValidationError $error */
    foreach ($malformedRequestResponse->getValidationErrors() as $error) {
      $constraintViolation = new ConstraintViolation($error->getErrorMessage(), null, $error->getParameters(), $malformedRequestResponse->getPath(), null, $error->getMalformedValue());
      $violationList->add($constraintViolation);
    }
    return $violationList;
  }

}
