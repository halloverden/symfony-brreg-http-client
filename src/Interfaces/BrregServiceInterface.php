<?php


namespace HalloVerden\BrregHttpClient\Interfaces;

use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization;

interface BrregServiceInterface {

  /**
   * @param string $organizationNumber
   * @param bool $fetchParentsIfPresent
   *
   * @return Organization|null
   */
  public function findOrganizationByOrganizationNumber(string $organizationNumber, bool $fetchParentsIfPresent = false): ?Organization;
}
