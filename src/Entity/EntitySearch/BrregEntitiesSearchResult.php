<?php

namespace HalloVerden\BrregHttpClient\Entity\EntitySearch;

use HalloVerden\BrregHttpClient\Entity\BrregEntity;
use HalloVerden\BrregHttpClient\Entity\Page;
use JMS\Serializer\Annotation\SerializedName;

final class BrregEntitiesSearchResult {

  /**
   * @var BrregEntity[]
   */
  public array $entities {
    get => $this->embeddedEntities?->entities ?? [];
  }

  public function __construct(
    #[SerializedName('page')]
    public readonly Page                    $page,
    #[SerializedName('_embedded')]
    private readonly ?EmbeddedBrregEntities $embeddedEntities = null
  ) {
  }

}
