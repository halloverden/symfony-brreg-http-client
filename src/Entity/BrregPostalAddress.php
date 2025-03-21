<?php

namespace HalloVerden\BrregHttpClient\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

readonly final class BrregPostalAddress {

  public function __construct(
    #[SerializedName('kommune')]
    public ?string $municipalityName = null,

    #[SerializedName('landkode')]
    public ?string $countryCode = null,

    #[SerializedName('postnummer')]
    public ?string $postalCode = null,

    #[SerializedName('adresse')]
    #[Type(name: 'array<string>')]
    public ?array  $address = null,

    #[SerializedName('land')]
    public ?string $country = null,

    #[SerializedName('kommunenummer')]
    public ?string $municipalityNumber = null,

    #[SerializedName('poststed')]
    public ?string $postalArea = null,
  ) {
  }

}
