<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Unit
 * @package HalloVerden\BrregHttpClient\Entity\External\Brreg\Response
 */
class Unit {
  /**
   * @var string
   *
   * @Serializer\SerializedName("organisasjonsnummer")
   * @Serializer\Type(name="string")
   * @Serializer\Expose()
   */
  private $organizationNumber;

  /**
   * @var string
   *
   * @Serializer\SerializedName("navn")
   * @Serializer\Type(name="string")
   * @Serializer\Expose()
   */
  private $name;

  /**
   * @var OrganizationForm
   *
   * @Serializer\SerializedName("organisasjonsform")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\OrganizationForm")
   * @Serializer\Expose()
   */
  private $organizationForm;

  /**
   * @var Address|null
   *
   * @Serializer\SerializedName("postadresse")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Address")
   * @Serializer\Expose()
   */
  private $postalAddress;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("registreringsdatoEnhetsregisteret")
   * @Serializer\Type(name="string")
   * @Serializer\Expose()
   */
  private $registrationDateUnitRegister;

  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIMvaregisteret")
   * @Serializer\Type(name="bool")
   * @Serializer\Expose()
   */
  private $registeredInTheRegisterOfGoods;

  /**
   * @var BusinessCode|null
   *
   * @Serializer\SerializedName("naeringskode1")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\BusinessCode")
   * @Serializer\Expose()
   */
  private $businessCode;

  /**
   * @var int|null
   *
   * @Serializer\SerializedName("antallAnsatte")
   * @Serializer\Type(name="integer")
   * @Serializer\Expose()
   */
  private $employeesNumber;

  /**
   * @var Address|null
   *
   * @Serializer\SerializedName("forretningsadresse")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Address")
   * @Serializer\Expose()
   */
  private $businessAddress;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("stiftelsesdato")
   * @Serializer\Type(name="string")
   * @Serializer\Expose()
   */
  private $foundationDate;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIForetaksregisteret")
   * @Serializer\Type(name="bool")
   * @Serializer\Expose()
   */
  private $registeredInTheBusinessRegister;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIStiftelsesregisteret")
   * @Serializer\Type(name="bool")
   * @Serializer\Expose()
   */
  private $registeredInTheFoundationRegister;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("registrertIFrivillighetsregisteret")
   * @Serializer\Type(name="bool")
   * @Serializer\Expose()
   */
  private $registeredInTheVolunteerRegister;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("konkurs")
   * @Serializer\Type(name="bool")
   * @Serializer\Expose()
   */
  private $bankrupt;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("underAvvikling")
   * @Serializer\Type(name="bool")
   * @Serializer\Expose()
   */
  private $underLiquidation;
  /**
   * @var bool|null
   *
   * @Serializer\SerializedName("underTvangsavviklingEllerTvangsopplosning")
   * @Serializer\Type(name="bool")
   * @Serializer\Expose()
   */
  private $underCompulsoryLiquidationOrDissolution;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("maalform")
   * @Serializer\Type(name="string")
   * @Serializer\Expose()
   */
  private $languageVariant;

  // Properties returned only in case the entity has been deleted from the register:

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("utgaatt")
   * @Serializer\Type(name="string")
   * @Serializer\Expose()
   */
  private $expiredAt;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("slettedato")
   * @Serializer\Type(name="string")
   * @Serializer\Expose()
   */
  private $deletedAt;

}
