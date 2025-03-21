<?php

namespace HalloVerden\BrregHttpClient;

use HalloVerden\BrregHttpClient\Entity\BrregEntity;
use HalloVerden\BrregHttpClient\Entity\BrregSubEntity;
use HalloVerden\BrregHttpClient\Entity\EntitySearch\BrregEntitiesSearchResult;
use HalloVerden\BrregHttpClient\Entity\EntitySearch\BrregSubEntitiesSearchResult;
use HalloVerden\BrregHttpClient\Entity\QueryFilter\SearchEntitiesQueryFilter;
use HalloVerden\BrregHttpClient\Exception\BrregDeletedEntityException;
use HalloVerden\BrregHttpClient\Exception\BrregHttpException;

interface BrregEntityClientInterface {

  /**
   * @param string $organizationNumber
   *
   * @return BrregEntity|null
   * @throws BrregHttpException
   * @throws BrregDeletedEntityException
   */
  public function fetchEntityByOrganizationNumber(string $organizationNumber): ?BrregEntity;

  /**
   * @param string $organizationNumber
   *
   * @return BrregSubEntity|null
   * @throws BrregDeletedEntityException
   * @throws BrregHttpException
   */
  public function fetchSubEntityByOrganizationNumber(string $organizationNumber): ?BrregSubEntity;

  /**
   * @param SearchEntitiesQueryFilter $filter
   *
   * @return BrregEntitiesSearchResult
   * @throws BrregHttpException
   */
  public function searchEntities(SearchEntitiesQueryFilter $filter): BrregEntitiesSearchResult;

  /**
   * @param SearchEntitiesQueryFilter $filter
   *
   * @return BrregSubEntitiesSearchResult
   * @throws BrregHttpException
   */
  public function searchSubEntities(SearchEntitiesQueryFilter $filter): BrregSubEntitiesSearchResult;

}
