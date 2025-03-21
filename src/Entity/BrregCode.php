<?php

namespace HalloVerden\BrregHttpClient\Entity;

use JMS\Serializer\Annotation\SerializedName;

readonly final class BrregCode {

  public function __construct(
    #[SerializedName('kode')]
    public ?string $code = null,

    #[SerializedName('beskrivelse')]
    public ?string $description = null,
  ) {
  }

}
