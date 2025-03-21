<?php

namespace HalloVerden\BrregHttpClient\Entity\EntitySearch;

use HalloVerden\BrregHttpClient\Entity\BrregSubEntity;
use HalloVerden\BrregHttpClient\Entity\Page;
use JMS\Serializer\Annotation\SerializedName;

final class BrregSubEntitiesSearchResult {

  /**
   * @var BrregSubEntity[]
   */
  public array $entities {
    get => $this->embeddedSubEntities?->subEntities ?? [];
  }

  public function __construct(
    #[SerializedName('page')]
    public readonly Page                       $page,
    #[SerializedName('_embedded')]
    private readonly ?EmbeddedBrregSubEntities $embeddedSubEntities = null
  ) {
  }

}
