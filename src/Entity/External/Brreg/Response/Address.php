<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Address
 * @package HalloVerden\BrregHttpClient\Entity\External\Brreg\Response
 */
class Address {

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("land")
   * @Serializer\Type(name="string")
   */
  private $country;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("landkode")
   * @Serializer\Type(name="string")
   */
  private $countryCode;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("postnummer")
   * @Serializer\Type(name="string")
   */
  private $postalCode;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("poststed")
   * @Serializer\Type(name="string")
   */
  private $postalArea;
  /**
   * @var array|string[]|null
   *
   * @Serializer\SerializedName("adresse")
   * @Serializer\Type(name="array")
   */
  private $address;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("kommune")
   * @Serializer\Type(name="string")
   */
  private $municipality;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("kommunenummer")
   * @Serializer\Type(name="string")
   */
  private $municipalityNumber;

}
