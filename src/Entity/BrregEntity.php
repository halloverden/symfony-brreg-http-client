<?php

namespace HalloVerden\BrregHttpClient\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

readonly final class BrregEntity extends AbstractBrregEntity {

  /**
   * @internal
   */
  public function __construct(
    string                     $organizationNumber,
    string                     $name,
    BrregOrganizationalForm    $organizationalForm,

    #[SerializedName('maalform')]
    public string              $languageForm,

    #[SerializedName('registrertIMvaregisteret')]
    public bool                $registeredInTheVatRegistry,

    #[SerializedName('underAvvikling')]
    public bool                $underLiquidation,

    #[SerializedName('registrertIStiftelsesregisteret')]
    public bool                $registeredInTheFoundationRegister,

    #[SerializedName('konkurs')]
    public bool                $bankrupt,

    #[SerializedName('registrertIFrivillighetsregisteret')]
    public bool                $registeredInTheRegisterOfNonProfitOrganizations,

    #[SerializedName('registrertIForetaksregisteret')]
    public bool                $registeredInTheRegisterOfBusinessEnterprises,

    #[SerializedName('underTvangsavviklingEllerTvangsopplosning')]
    public bool                $underCompulsoryLiquidationOrDissolution,

    #[SerializedName('harRegistrertAntallAnsatte')]
    public bool                $numberOfEmployeesIsRegistered,

    #[SerializedName('registreringsdatoEnhetsregisteret')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public \DateTimeImmutable  $registrationDate,

    #[SerializedName('postadresse')]
    public ?BrregPostalAddress $postalAddress = null,

    #[SerializedName('forretningsadresse')]
    public ?BrregPostalAddress $businessPostalAddress = null,

    #[SerializedName('naeringskode1')]
    public ?BrregCode          $industrialCode1 = null,

    #[SerializedName('naeringskode2')]
    public ?BrregCode          $industrialCode2 = null,

    #[SerializedName('naeringskode3')]
    public ?BrregCode          $industrialCode3 = null,

    #[SerializedName('hjelpeenhetskode')]
    public ?BrregCode          $auxiliaryUnitCode = null,

    #[SerializedName('underAvviklingDato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $underLiquidationDate = null,

    #[SerializedName('konkursdato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $bankruptcyDate = null,

    #[SerializedName('tvangsavvikletPgaManglendeSlettingDato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $liquidatedDueToLackOfDissolutionDate = null,

    #[SerializedName('tvangsopplostPgaManglendeDagligLederDato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $liquidatedDueToLackOfManagingDirectorDate = null,

    #[SerializedName('tvangsopplostPgaManglendeRevisorDato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $liquidatedDueToLackOfAuditorDate = null,

    #[SerializedName('tvangsopplostPgaManglendeRegnskapDato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $liquidatedDueToLackOfAccountsDate = null,

    #[SerializedName('tvangsopplostPgaMangelfulltStyreDato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $liquidatedDueToDeficientBoardDate = null,

    #[SerializedName('vedtektsdato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $statuesDate = null,

    /** @var string[] */
    #[SerializedName('vedtektsfestetFormaal')]
    #[Type(name: 'array<string>')]
    public array               $purpose = [],

    /** @var string[] */
    #[SerializedName('aktivitet')]
    #[Type(name: 'array<string>')]
    public array               $activity = [],

    /** @var BrregRemarks[] */
    #[SerializedName('paategninger')]
    #[Type(name: 'array<' . BrregRemarks::class . '>')]
    public ?array              $remarks = null,

    #[SerializedName('stiftelsesdato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $foundationDate = null,

    #[SerializedName('institusjonellSektorkode')]
    public ?BrregCode          $institutionalSectorCode = null,

    #[SerializedName('hjemmeside')]
    public ?string             $website = null,

    #[SerializedName('sisteInnsendteAarsregnskap')]
    public ?string             $lastSubmittedAnnualAccountsYear = null,

    #[SerializedName('frivilligMvaRegistrertBeskrivelser')]
    #[Type(name: 'array<string>')]
    public ?array              $voluntaryVatRegistryDescriptions = null,

    #[SerializedName('antallAnsatte')]
    public ?int                $numberOfEmployees = null,

    #[SerializedName('overordnetEnhet')]
    public ?string             $superiorEntityOrganizationNumber = null,

    #[SerializedName('registreringsnummerIHjemlandet')]
    public ?string             $registrationNumberInNativeCountry = null,

    #[SerializedName('registreringsdatoAntallAnsatteNAVAaregisteret')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $registrationOfNumberOfEmployeesInNavEmployersAndEmployeesDate = null,

    #[SerializedName('registreringsdatoAntallAnsatteEnhetsregisteret')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $registrationOfNumberOfEmployeesDate = null,

    #[SerializedName('registreringsdatoMerverdiavgiftsregisteret')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $registrationInTheVatRegistryDate = null,

    #[SerializedName('registreringsdatoMerverdiavgiftsregisteretEnhetsregisteret')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $registrationInTheVatRegistryInTheCcrDate = null,

    #[SerializedName('registreringsdatoFrivilligMerverdiavgiftsregisteret')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $registrationInTheVoluntaryVatRegistryDate = null,

    #[SerializedName('registreringsdatoForetaksregisteret')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $registrationsInTheRegisterOfBusinessEnterprisesDate = null,

    #[SerializedName('registreringsdatoFrivillighetsregisteret')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $registrationInTheRegisterOfNonProfitOrganizationsDate = null,

    #[SerializedName('registrertIPartiregisteret')]
    public ?bool               $registeredInTheRegisterOfPoliticalParties = null,

    #[SerializedName('registreringsdatoPartiregisteret')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $registeredInTheRegisterOfPoliticalPartiesDate = null,

    #[SerializedName('epostadresse')]
    public ?string             $emailAddress = null,

    #[SerializedName('telefon')]
    public ?string             $phoneNumber = null,

    #[SerializedName('mobil')]
    public ?string             $mobilePhoneNumber = null,
  ) {
    parent::__construct($organizationNumber, $name, $organizationalForm);
  }

}
