<?php

namespace HalloVerden\BrregHttpClient\Entity;

use JMS\Serializer\Annotation\SerializedName;

readonly final class Page {

  public function __construct(
    #[SerializedName('number')]
    public int $number,

    #[SerializedName('size')]
    public int $size,

    #[SerializedName('totalPages')]
    public int $totalPages,

    #[SerializedName('totalElements')]
    public int $totalElements
  ) {
  }

}
