<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Organization
 * @package HalloVerden\BrregHttpClient\Entity\External\Brreg\Response
 */
class Organization {
  /**
   * @var string
   *
   * @Serializer\SerializedName("organisasjonsnummer")
   * @Serializer\Type(name="string")
   */
  protected $organizationNumber;

  /**
   * @var string
   *
   * @Serializer\SerializedName("navn")
   * @Serializer\Type(name="string")
   */
  protected $name;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("stiftelsesdato")
   * @Serializer\Type(name="string")
   */
  protected $foundationDate;

  /**
   * @var int|null
   *
   * @Serializer\SerializedName("antallAnsatte")
   * @Serializer\Type(name="integer")
   */
  protected $employeesNumber;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("overordnetEnhet")
   * @Serializer\Type(name="string")
   */
  protected $parentOrganizationNumber;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("registreringsdatoEnhetsregisteret")
   * @Serializer\Type(name="string")
   */
  protected $registrationDateUnitRegister;

  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIMvaregisteret")
   * @Serializer\Type(name="bool")
   */
  protected $registeredInTheRegisterOfGoods;

  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIForetaksregisteret")
   * @Serializer\Type(name="bool")
   */
  protected $registeredInTheBusinessRegister;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIStiftelsesregisteret")
   * @Serializer\Type(name="bool")
   */
  protected $registeredInTheFoundationRegister;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIFrivillighetsregisteret")
   * @Serializer\Type(name="bool")
   */
  protected $registeredInTheVolunteerRegister;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("konkurs")
   * @Serializer\Type(name="bool")
   */
  protected $bankrupt;

  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("underAvvikling")
   * @Serializer\Type(name="bool")
   */
  protected $underLiquidation;

  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("underTvangsavviklingEllerTvangsopplosning")
   * @Serializer\Type(name="bool")
   */
  protected $underCompulsoryLiquidationOrDissolution;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("maalform")
   * @Serializer\Type(name="string")
   */
  protected $languageVariant;

  /**
   * @var Code|null
   *
   * @Serializer\SerializedName("organisasjonsform")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Code")
   */
  protected $organizationForm;

  /**
   * @var Code|null
   *
   * @Serializer\SerializedName("naeringskode1")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Code")
   */
  protected $businessCode;

  /**
   * @var Address|null
   *
   * @Serializer\SerializedName("postadresse")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Address")
   */
  protected $postalAddress;

  /**
   * @var Address|null
   *
   * @Serializer\SerializedName("forretningsadresse")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Address")
   */
  protected $businessAddress;

  /**
   * @var Address|null
   *
   * @Serializer\SerializedName("beliggenhetsadresse")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Address")
   */
  protected $locationAddress;

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
   */
  protected $closureAt;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("utgaatt")
   * @Serializer\Type(name="string")
   */
  protected $expiredAt;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("slettedato")
   * @Serializer\Type(name="string")
   */
  protected $deletedAt;

  /**
   * @return string
   */
  public function getOrganizationNumber(): string {
    return $this->organizationNumber;
  }

  /**
   * @return string
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * @return string|null
   */
  public function getFoundationDate(): ?string {
    return $this->foundationDate;
  }

  /**
   * @return int|null
   */
  public function getEmployeesNumber(): ?int {
    return $this->employeesNumber;
  }

  /**
   * @return string|null
   */
  public function getParentOrganizationNumber(): ?string {
    return $this->parentOrganizationNumber;
  }

  /**
   * @return string|null
   */
  public function getRegistrationDateUnitRegister(): ?string {
    return $this->registrationDateUnitRegister;
  }

  /**
   * @return bool|null
   */
  public function getRegisteredInTheRegisterOfGoods(): ?bool {
    return $this->registeredInTheRegisterOfGoods;
  }

  /**
   * @return bool|null
   */
  public function getRegisteredInTheBusinessRegister(): ?bool {
    return $this->registeredInTheBusinessRegister;
  }

  /**
   * @return bool|null
   */
  public function getRegisteredInTheFoundationRegister(): ?bool {
    return $this->registeredInTheFoundationRegister;
  }

  /**
   * @return bool|null
   */
  public function getRegisteredInTheVolunteerRegister(): ?bool {
    return $this->registeredInTheVolunteerRegister;
  }

  /**
   * @return bool|null
   */
  public function getBankrupt(): ?bool {
    return $this->bankrupt;
  }

  /**
   * @return bool|null
   */
  public function getUnderLiquidation(): ?bool {
    return $this->underLiquidation;
  }

  /**
   * @return bool|null
   */
  public function getUnderCompulsoryLiquidationOrDissolution(): ?bool {
    return $this->underCompulsoryLiquidationOrDissolution;
  }

  /**
   * @return string|null
   */
  public function getLanguageVariant(): ?string {
    return $this->languageVariant;
  }

  /**
   * @return Code|null
   */
  public function getOrganizationForm(): ?Code {
    return $this->organizationForm;
  }

  /**
   * @return Code|null
   */
  public function getBusinessCode(): ?Code {
    return $this->businessCode;
  }

  /**
   * @return Address|null
   */
  public function getPostalAddress(): ?Address {
    return $this->postalAddress;
  }

  /**
   * @return Address|null
   */
  public function getBusinessAddress(): ?Address {
    return $this->businessAddress;
  }

  /**
   * @return Address|null
   */
  public function getLocationAddress(): ?Address {
    return $this->locationAddress;
  }

  /**
   * @return Organization|null
   */
  public function getParentOrganization(): ?Organization {
    return $this->parentOrganization;
  }

  /**
   * @param Organization|null $parentOrganization
   */
  public function setParentOrganization(?Organization $parentOrganization): void {
    $this->parentOrganization = $parentOrganization;
  }

  /**
   * @return string|null
   */
  public function getClosureAt(): ?string {
    return $this->closureAt;
  }

  /**
   * @return string|null
   */
  public function getExpiredAt(): ?string {
    return $this->expiredAt;
  }

  /**
   * @return string|null
   */
  public function getDeletedAt(): ?string {
    return $this->deletedAt;
  }

}
