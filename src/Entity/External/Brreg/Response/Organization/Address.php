<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Address
 * @package HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization
 */
class Address {

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("land")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $land;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("landkode")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $landkode;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("postnummer")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $postnummer;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("poststed")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $poststed;
  /**
   * @var array|string[]|null
   *
   * @Serializer\SerializedName("adresse")
   * @Serializer\Type(name="array")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $adresse;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("kommune")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $kommune;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("kommunenummer")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $kommunenummer;

  /**
   * @return string|null
   */
  public function getCountry(): ?string {
    return $this->land;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("countryCode")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization","Organization"})
   *
   * @return string|null
   */
  public function getCountryCode(): ?string {
    return $this->landkode;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("postalCode")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization","Organization"})
   *
   * @return string|null
   */
  public function getPostalCode(): ?string {
    return $this->postnummer;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("postalArea")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization","Organization"})
   *
   * @return string|null
   */
  public function getPostalArea(): ?string {
    return $this->poststed;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("address")
   * @Serializer\Type(name="array")
   * @Serializer\Groups({"Serialization","Organization"})
   *
   * @return array|string[]|null
   */
  public function getAddress(): ?array {
    return $this->adresse;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("municipality")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization","Organization"})
   *
   * @return string|null
   */
  public function getMunicipality(): ?string {
    return $this->kommune;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("municipalityNumber")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization","Organization"})
   *
   * @return string|null
   */
  public function getMunicipalityNumber(): ?string {
    return $this->kommunenummer;
  }

}
