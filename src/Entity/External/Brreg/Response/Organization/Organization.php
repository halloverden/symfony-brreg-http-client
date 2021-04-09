<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization;

use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links\Links;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Organization
 * @package HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization
 */
class Organization {
  /**
   * @var string
   *
   * @Serializer\SerializedName("organisasjonsnummer")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $organisasjonsnummer;

  /**
   * @var string
   *
   * @Serializer\SerializedName("navn")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $navn;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("stiftelsesdato")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $stiftelsesdato;

  /**
   * @var int|null
   *
   * @Serializer\SerializedName("antallAnsatte")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $antallAnsatte;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("overordnetEnhet")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $overordnetEnhet;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("registreringsdatoEnhetsregisteret")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $registreringsdatoEnhetsregisteret;

  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIMvaregisteret")
   * @Serializer\Type(name="bool")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $registrertIMvaregisteret;

  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIForetaksregisteret")
   * @Serializer\Type(name="bool")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $registrertIForetaksregisteret;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIStiftelsesregisteret")
   * @Serializer\Type(name="bool")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $registrertIStiftelsesregisteret;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIFrivillighetsregisteret")
   * @Serializer\Type(name="bool")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $registrertIFrivillighetsregisteret;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("konkurs")
   * @Serializer\Type(name="bool")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $konkurs;

  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("underAvvikling")
   * @Serializer\Type(name="bool")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $underAvvikling;

  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("underTvangsavviklingEllerTvangsopplosning")
   * @Serializer\Type(name="bool")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $underTvangsavviklingEllerTvangsopplosning;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("maalform")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $maalform;

  /**
   * @var Code|null
   *
   * @Serializer\SerializedName("organisasjonsform")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Code")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $organisasjonsform;

  /**
   * @var Code|null
   *
   * @Serializer\SerializedName("naeringskode1")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Code")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $naeringskode1;

  /**
   * @var Address|null
   *
   * @Serializer\SerializedName("postadresse")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Address")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $postadresse;

  /**
   * @var Address|null
   *
   * @Serializer\SerializedName("forretningsadresse")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Address")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $forretningsadresse;

  /**
   * @var Address|null
   *
   * @Serializer\SerializedName("beliggenhetsadresse")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Address")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $beliggenhetsadresse;

  /**
   * @var Organization|null
   *
   * Parent Organization, is fetched only if $parentOrganizationNumber property is not null and if the $fetchParentOrganization param is set to true
   */
  protected $parentOrganization;

  // Properties returned only in case the entity has been deleted from the register:

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("nedleggelsesdato")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $nedleggelsesdato;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("utgaatt")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $utgaatt;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("slettedato")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $slettedato;

  /**
   * @var Links
   *
   * @Serializer\SerializedName("_links")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links\Links")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $_links;

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("organizationNumber")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string
   */
  public function getOrganizationNumber(): string {
    return $this->organisasjonsnummer;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("name")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string
   */
  public function getName(): string {
    return $this->navn;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("foundationDate")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string|null
   */
  public function getFoundationDate(): ?string {
    return $this->stiftelsesdato;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("employeesNumber")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Serialization"})
   *
   * @return int|null
   */
  public function getEmployeesNumber(): ?int {
    return $this->antallAnsatte;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("parentOrganizationNumber")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string|null
   */
  public function getParentOrganizationNumber(): ?string {
    return $this->overordnetEnhet;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("registrationDateUnitRegister")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string|null
   */
  public function getRegistrationDateUnitRegister(): ?string {
    return $this->registreringsdatoEnhetsregisteret;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("registeredInTheRegisterOfGoods")
   * @Serializer\Type(name="boolean")
   * @Serializer\Groups({"Serialization"})
   *
   * @return bool|null
   */
  public function getRegisteredInTheRegisterOfGoods(): ?bool {
    return $this->registrertIMvaregisteret;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("registeredInTheBusinessRegister")
   * @Serializer\Type(name="boolean")
   * @Serializer\Groups({"Serialization"})
   *
   * @return bool|null
   */
  public function getRegisteredInTheBusinessRegister(): ?bool {
    return $this->registrertIForetaksregisteret;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("registeredInTheFoundationRegister")
   * @Serializer\Type(name="boolean")
   * @Serializer\Groups({"Serialization"})
   *
   * @return bool|null
   */
  public function getRegisteredInTheFoundationRegister(): ?bool {
    return $this->registrertIStiftelsesregisteret;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("registeredInTheVolunteerRegister")
   * @Serializer\Type(name="boolean")
   * @Serializer\Groups({"Serialization"})
   *
   * @return bool|null
   */
  public function getRegisteredInTheVolunteerRegister(): ?bool {
    return $this->registrertIFrivillighetsregisteret;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("bankrupt")
   * @Serializer\Type(name="boolean")
   * @Serializer\Groups({"Serialization"})
   *
   * @return bool|null
   */
  public function getBankrupt(): ?bool {
    return $this->konkurs;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("underLiquidation")
   * @Serializer\Type(name="boolean")
   * @Serializer\Groups({"Serialization"})
   *
   * @return bool|null
   */
  public function getUnderLiquidation(): ?bool {
    return $this->underAvvikling;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("underCompulsoryLiquidationOrDissolution")
   * @Serializer\Type(name="boolean")
   * @Serializer\Groups({"Serialization"})
   *
   * @return bool|null
   */
  public function getUnderCompulsoryLiquidationOrDissolution(): ?bool {
    return $this->underTvangsavviklingEllerTvangsopplosning;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("languageVariant")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string|null
   */
  public function getLanguageVariant(): ?string {
    return $this->maalform;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("organizationForm")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Code")
   * @Serializer\Groups({"Serialization"})
   *
   * @return Code|null
   */
  public function getOrganizationForm(): ?Code {
    return $this->organisasjonsform;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("businessCode")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Code")
   * @Serializer\Groups({"Serialization"})
   *
   * @return Code|null
   */
  public function getBusinessCode(): ?Code {
    return $this->naeringskode1;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("postalAddress")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Address")
   * @Serializer\Groups({"Serialization"})
   *
   * @return Address|null
   */
  public function getPostalAddress(): ?Address {
    return $this->postadresse;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("businessAddress")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Address")
   * @Serializer\Groups({"Serialization"})
   *
   * @return Address|null
   */
  public function getBusinessAddress(): ?Address {
    return $this->forretningsadresse;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("locationAddress")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Address")
   * @Serializer\Groups({"Serialization"})
   *
   * @return Address|null
   */
  public function getLocationAddress(): ?Address {
    return $this->beliggenhetsadresse;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("parentOrganization")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Organization")
   * @Serializer\Groups({"Serialization"})
   *
   * @return Organization|null
   */
  public function getParentOrganization(): ?Organization {
    return $this->parentOrganization;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("closureAt")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string|null
   */
  public function getClosureAt(): ?string {
    return $this->nedleggelsesdato;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("expiredAt")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string|null
   */
  public function getExpiredAt(): ?string {
    return $this->utgaatt;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("deletedAt")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string|null
   */
  public function getDeletedAt(): ?string {
    return $this->slettedato;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("links")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links\Links")
   * @Serializer\Groups({"Serialization"})
   *
   * @return Links
   */
  public function getLinks(): Links {
    return $this->_links;
  }

  /**
   * @param Organization|null $parentOrganization
   */
  public function setParentOrganization(?Organization $parentOrganization): void {
    $this->parentOrganization = $parentOrganization;
  }

}
