<?php


namespace HalloVerden\BrregHttpClient\Services;


use BrregSearchInterface;
use Psr\Log\LoggerInterface;

class BrregSearchService implements BrregSearchInterface {

  /**
   * @var LoggerInterface
   */
  private $logger;

  /**
   * BrregSearchService constructor.
   * @param LoggerInterface $logger
   */
  public function __construct(LoggerInterface $logger) {
    $this->logger = $logger;
  }

  /**
   * @inheritDoc
   */
  public function findOrganizationByOrganizationNumber(int $organizationNumber) {
    // TODO: Implement findOrganizationByOrganizationNumber() method.
  }
}
