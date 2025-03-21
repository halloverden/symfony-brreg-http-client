<?php

namespace HalloVerden\BrregHttpClient\Entity\EntitySearch;

use HalloVerden\BrregHttpClient\Entity\BrregEntity;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

readonly final class EmbeddedBrregEntities {

  /**
   * @param BrregEntity[] $entities
   */
  public function __construct(
    /** @var BrregEntity[] */
    #[SerializedName('enheter')]
    #[Type(name: 'array<' . BrregEntity::class . '>')]
    public array $entities = [],
  ) {
  }

}
