<?php


namespace HalloVerden\BrregHttpClient\Interfaces;

use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Organization;

interface BrregServiceInterface {

  /**
   * @param string $organizationNumber
   * @param bool $fetchParentsIfPresent
   *
   * @return Organization
   */
  public function findOrganizationByOrganizationNumber(string $organizationNumber, bool $fetchParentsIfPresent = false): Organization;
}
