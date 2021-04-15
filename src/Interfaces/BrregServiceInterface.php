<?php


namespace HalloVerden\BrregHttpClient\Interfaces;

use Doctrine\Common\Collections\Collection;
use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Organization;

interface BrregServiceInterface {

  /**
   * @param string $organizationNumber
   * @param bool $fetchParentsIfPresent
   *
   * @return Organization
   */
  public function findOrganizationByOrganizationNumber(string $organizationNumber, bool $fetchParentsIfPresent = false): Organization;

  /**
   * @param string $organizationName
   * @param bool $searchForSubunit
   * @param array $queryParams
   *
   * @return Collection<Organization>
   */
  public function findOrganizationByOrganizationName(string $organizationName, bool $searchForSubunit = false, array $queryParams = []): Collection;

  }
