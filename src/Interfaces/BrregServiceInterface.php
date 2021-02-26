<?php


namespace HalloVerden\BrregHttpClient\Interfaces;

use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization;

interface BrregServiceInterface {

  /**
   * @param int $organizationNumber
   * @param bool $fetchParentsIfPresent
   *
   * @return Organization|null
   */
  public function findOrganizationByOrganizationNumber(int $organizationNumber, bool $fetchParentsIfPresent = false): ?Organization;
}
