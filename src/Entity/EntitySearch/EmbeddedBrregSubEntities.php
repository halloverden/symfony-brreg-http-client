<?php

namespace HalloVerden\BrregHttpClient\Entity\EntitySearch;

use HalloVerden\BrregHttpClient\Entity\BrregSubEntity;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

readonly final class EmbeddedBrregSubEntities {

  /**
   * @param BrregSubEntity[] $subEntities
   */
  public function __construct(
    /** @var BrregSubEntity[] */
    #[SerializedName('underenheter')]
    #[Type(name: 'array<' . BrregSubEntity::class . '>')]
    public array $subEntities = [],
  ) {
  }

}
