<?php

namespace HalloVerden\BrregHttpClient\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

readonly final class BrregRemarks {

  public function __construct(
    #[SerializedName('infotype')]
    public ?string             $infoType = null,

    #[SerializedName('tekst')]
    public ?string             $text = null,

    #[SerializedName('innfoertDato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $introductionDate = null,
  ) {
  }

}
