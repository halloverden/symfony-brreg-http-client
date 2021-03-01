<?php


namespace HalloVerden\BrregHttpClient\Services;


use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization;
use HalloVerden\BrregHttpClient\Interfaces\BrregServiceInterface;
use HalloVerden\HttpExceptions\BadGatewayException;
use HalloVerden\HttpExceptions\Http\HttpException;
use HalloVerden\HttpExceptions\Http\NotFoundHttpException;
use HalloVerden\HttpExceptions\InternalServerErrorException;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BrregService implements BrregServiceInterface {
  const API_UNAVAILABLE = 'BRREG_API_UNAVAILABLE';
  const NO_ORGANIZATION_FOUND = 'NO_ORGANIZATION_FOUND';
  const ORGANIZATION_GONE = 'ORGANIZATION_GONE';

  const BRREG_UNIT_URL = 'https://data.brreg.no/enhetsregisteret/api/enheter/%s';
  const BRREG_SUBUNIT_URL = 'https://data.brreg.no/enhetsregisteret/api/underenheter/%s';

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
   * @param bool $fetchParentsIfPresent
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
   * @param string $organizationNumber
   * @param bool $fetchParentsIfPresent
   * @param bool $searchForSubunit
   *
   * @return Organization
   */
  private function findUnitByOrganizationNumber(string $organizationNumber, bool $fetchParentsIfPresent = false, bool $searchForSubunit = false): Organization {
    try {
      $response = $this->client->request(Request::METHOD_GET,
        sprintf($searchForSubunit ? self::BRREG_SUBUNIT_URL : self::BRREG_UNIT_URL, $organizationNumber)
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

}
