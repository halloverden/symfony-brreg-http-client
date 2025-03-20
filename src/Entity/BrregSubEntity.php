<?php

namespace HalloVerden\BrregHttpClient\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

readonly final class BrregSubEntity extends AbstractBrregEntity {

  public function __construct(
    string                     $organizationNumber,
    string                     $name,
    BrregOrganizationalForm    $organizationalForm,

    #[SerializedName('registrertIMvaregisteret')]
    public bool                $registeredInTheVatRegistry,

    #[SerializedName('harRegistrertAntallAnsatte')]
    public bool                $numberOfEmployeesIsRegistered,

    #[SerializedName('registreringsdatoEnhetsregisteret')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public \DateTimeImmutable  $registrationDate,

    #[SerializedName('postadresse')]
    public ?BrregPostalAddress $postalAddress = null,

    #[SerializedName('beliggenhetsadresse')]
    public ?BrregPostalAddress $locationPostalAddress = null,

    #[SerializedName('naeringskode1')]
    public ?BrregCode          $industrialCode1 = null,

    #[SerializedName('naeringskode2')]
    public ?BrregCode          $industrialCode2 = null,

    #[SerializedName('naeringskode3')]
    public ?BrregCode          $industrialCode3 = null,

    #[SerializedName('hjelpeenhetskode')]
    public ?BrregCode          $auxiliaryUnitCode = null,

    #[SerializedName('hjemmeside')]
    public ?string             $website = null,

    #[SerializedName('frivilligMvaRegistrertBeskrivelser')]
    #[Type(name: 'array<string>')]
    public ?array              $voluntaryVatRegistryDescriptions = null,

    #[SerializedName('antallAnsatte')]
    public ?int                $numberOfEmployees = null,

    #[SerializedName('overordnetEnhet')]
    public ?string             $superiorEntityOrganizationNumber = null,

    #[SerializedName('oppstartsdato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $startDate = null,

    #[SerializedName('datoEierskifte')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $ownershipChangeDate = null,

    #[SerializedName('nedleggelsesdato')]
    #[Type(name: \DateTimeImmutable::class . "<'!Y-m-d'>")]
    public ?\DateTimeImmutable $closureDate = null,

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
