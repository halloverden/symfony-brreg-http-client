<?php

namespace HalloVerden\BrregHttpClient\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

readonly final class BrregOrganizationalForm {

  /**
   * @internal
   */
  public function __construct(
    #[SerializedName('kode')]
    public string                      $code,

    #[SerializedName('beskrivelse')]
    public string                      $description,

    #[SerializedName('utgaatt')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable         $expirationDate = null,
  ) {
  }

}
