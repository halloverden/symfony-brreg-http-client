<?php


namespace HalloVerden\BrregHttpClient\Services;


use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization;
use HalloVerden\BrregHttpClient\Exceptions\BadGatewayException;
use HalloVerden\BrregHttpClient\Interfaces\BrregServiceInterface;
use HalloVerden\HttpExceptions\InternalServerErrorException;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BrregService implements BrregServiceInterface {
  const API_UNAVAILABLE = 'BRREG_API_UNAVAILABLE';
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
  private $logger;

  /**
   * BrregSearchService constructor.
   * @param HttpClientInterface $client
   * @param SerializerInterface $serializer
   * @param LoggerInterface $logger
   */
  public function __construct(HttpClientInterface $client, SerializerInterface $serializer, LoggerInterface $logger) {
    $this->client = $client;
    $this->serializer = $serializer;
    $this->logger = $logger;
  }

  /**
   * @param int $organizationNumber
   * @param bool $fetchParentsIfPresent
   *
   * @return Organization|null
   */
  public function findOrganizationByOrganizationNumber(int $organizationNumber, bool $fetchParentsIfPresent = false): ?Organization {
    // try to find independent unit first
    $organization = $this->findUnitByOrganizationNumber($organizationNumber, $fetchParentsIfPresent);
    // try to find subunit if no result was found
    if(null === $organization) {
      $organization = $this->findUnitByOrganizationNumber($organizationNumber, $fetchParentsIfPresent, true);
    }
    return $organization;
  }

  /**
   * @param int $organizationNumber
   * @param bool $searchForSubunit
   * @param bool $fetchParentsIfPresent
   *
   * @return Organization|null
   */
  private function findUnitByOrganizationNumber(int $organizationNumber, bool $fetchParentsIfPresent = false, bool $searchForSubunit = false): ?Organization {
    try {
      $response = $this->client->request(Request::METHOD_GET,
        sprintf($searchForSubunit ? self::BRREG_SUBUNIT_URL : self::BRREG_UNIT_URL, $organizationNumber)
      );
      switch ($response->getStatusCode()) {
        case Response::HTTP_NOT_FOUND:
        case Response::HTTP_NO_CONTENT:
          return null;
        case Response::HTTP_OK:
        case Response::HTTP_GONE:
          /** @var Organization $organization */
          $organization = $this->serializer->deserialize($response->getContent(false), Organization::class, 'json');
          if($fetchParentsIfPresent && $organization->getParentOrganizationNumber() !== null) {
            $organization->setParentOrganization($this->findOrganizationByOrganizationNumber($organization->getParentOrganizationNumber(), $fetchParentsIfPresent));
          }
          return $organization;
        default:
          $this->logger->error(self::API_UNAVAILABLE, ['statusCode' => $response->getStatusCode()]);
          throw new InternalServerErrorException(self::API_UNAVAILABLE);
      }
    } catch (ExceptionInterface $e) {
      $this->logger->error(self::API_UNAVAILABLE, ['exception' => $e]);
      throw new BadGatewayException(self::API_UNAVAILABLE, [
        'organizationNumber'    => $organizationNumber,
        'fetchParentsIfPresent' => $fetchParentsIfPresent,
        'searchForSubunit'      => $searchForSubunit
      ], $e);
    }
  }

}
