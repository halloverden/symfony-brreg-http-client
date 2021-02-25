<?php


interface BrregSearchInterface {

  /**
   * @param int $organizationNumber
   *
   * @return mixed
   */
  public function findOrganizationByOrganizationNumber(int $organizationNumber);
}
