<?php

namespace HalloVerden\BrregHttpClient\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

readonly final class BrregDeletedEntity extends AbstractBrregEntity {

  public function __construct(
    string                          $organizationNumber,
    string                          $name,
    BrregOrganizationalForm         $organizationalForm,

    #[SerializedName('slettedato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable      $deletedDate,
  ) {
    parent::__construct($organizationNumber, $name, $organizationalForm);
  }


}
