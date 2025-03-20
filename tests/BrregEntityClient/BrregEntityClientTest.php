<?php

namespace HalloVerden\BrregHttpClient\Tests\BrregEntityClient;

use HalloVerden\BrregHttpClient\BrregEntityClient;
use HalloVerden\BrregHttpClient\Entity\BrregRemarks;
use HalloVerden\BrregHttpClient\Entity\QueryFilter\SearchEntitiesQueryFilter;
use HalloVerden\BrregHttpClient\Exception\BrregDeletedEntityException;
use HalloVerden\BrregHttpClient\Exception\BrregHttpException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\JsonMockResponse;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\HttpFoundation\Response;

class BrregEntityClientTest extends TestCase {

  /**
   * @return void
   * @throws BrregDeletedEntityException
   * @throws BrregHttpException
   * @throws \JsonException
   */
  public function testFetchEntityByOrganizationNumber_withEntity_shouldReturnEntity(): void {
    $httpClient = new MockHttpClient([JsonMockResponse::fromFile(__DIR__ . '/Mocks/BrregEntity.json')]);
    $client = new BrregEntityClient($httpClient);

    $brregEntity = $client->fetchEntityByOrganizationNumber('509100675');

    $this->assertNotNull($brregEntity);
    $this->assertEquals('509100675', $brregEntity->organizationNumber);
    $this->assertEquals('Sesam stasjon', $brregEntity->name);
    $this->assertEquals('ASA', $brregEntity->organizationalForm->code);
    $this->assertEquals('Allmennaksjeselskap', $brregEntity->organizationalForm->description);
    $this->assertEquals(new \DateTimeImmutable('2024-01-03'), $brregEntity->organizationalForm->expirationDate);
    $this->assertNotNull($brregEntity->postalAddress);
    $this->assertEquals('Oslo', $brregEntity->postalAddress->municipalityName);
    $this->assertEquals('NO', $brregEntity->postalAddress->countryCode);
    $this->assertEquals('0010', $brregEntity->postalAddress->postalCode);
    $this->assertEquals(['Oslo'], $brregEntity->postalAddress->address);
    $this->assertEquals('Norge', $brregEntity->postalAddress->country);
    $this->assertEquals('0301', $brregEntity->postalAddress->municipalityNumber);
    $this->assertEquals('Oslo', $brregEntity->postalAddress->postalArea);
    $this->assertNotNull($brregEntity->businessPostalAddress);
    $this->assertEquals('Oslo', $brregEntity->businessPostalAddress->municipalityName);
    $this->assertEquals('NO', $brregEntity->businessPostalAddress->countryCode);
    $this->assertEquals('0010', $brregEntity->businessPostalAddress->postalCode);
    $this->assertEquals(['Oslo'], $brregEntity->businessPostalAddress->address);
    $this->assertEquals('Norge', $brregEntity->businessPostalAddress->country);
    $this->assertEquals('0301', $brregEntity->businessPostalAddress->municipalityNumber);
    $this->assertEquals('Oslo', $brregEntity->businessPostalAddress->postalArea);
    $this->assertTrue($brregEntity->registeredInTheVatRegistry);
    $this->assertEquals('Bokmål', $brregEntity->languageForm);
    $this->assertEquals('41.109', $brregEntity->industrialCode1->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregEntity->industrialCode1->description);
    $this->assertEquals('41.109', $brregEntity->industrialCode2->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregEntity->industrialCode2->description);
    $this->assertEquals('41.109', $brregEntity->industrialCode3->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregEntity->industrialCode3->description);
    $this->assertEquals('70.100', $brregEntity->auxiliaryUnitCode->code);
    $this->assertEquals('Hovedkontortjenester', $brregEntity->auxiliaryUnitCode->description);
    $this->assertTrue($brregEntity->underLiquidation);
    $this->assertEquals(new \DateTimeImmutable('2024-01-04'), $brregEntity->underLiquidationDate);
    $this->assertTrue($brregEntity->registeredInTheFoundationRegister);
    $this->assertTrue($brregEntity->bankrupt);
    $this->assertEquals(new \DateTimeImmutable('2024-01-05'), $brregEntity->bankruptcyDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-06'), $brregEntity->liquidatedDueToLackOfDissolutionDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-07'), $brregEntity->liquidatedDueToLackOfManagingDirectorDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-08'), $brregEntity->liquidatedDueToLackOfAuditorDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-09'), $brregEntity->liquidatedDueToLackOfAccountsDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-10'), $brregEntity->liquidatedDueToDeficientBoardDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-11'), $brregEntity->statuesDate);
    $this->assertEquals(['Telekommunikasjonsvirksomhet'], $brregEntity->purpose);
    $this->assertEquals(['Telekommunikasjonsvirksomhet'], $brregEntity->activity);
    $this->assertCount(2, $brregEntity->remarks);
    $this->assertContainsOnlyInstancesOf(BrregRemarks::class, $brregEntity->remarks);
    $this->assertEquals('NAVN', $brregEntity->remarks[0]->infoType);
    $this->assertEquals('Påtegning på navn', $brregEntity->remarks[0]->text);
    $this->assertEquals(new \DateTimeImmutable('2024-01-01'), $brregEntity->remarks[0]->introductionDate);
    $this->assertEquals('FADR', $brregEntity->remarks[1]->infoType);
    $this->assertEquals('Påtegning på forretningsadresse', $brregEntity->remarks[1]->text);
    $this->assertEquals(new \DateTimeImmutable('2024-01-02'), $brregEntity->remarks[1]->introductionDate);
    $this->assertTrue($brregEntity->registeredInTheRegisterOfNonProfitOrganizations);
    $this->assertEquals(new \DateTimeImmutable('2024-01-12'), $brregEntity->foundationDate);
    $this->assertNotNull($brregEntity->institutionalSectorCode);
    $this->assertEquals('8200', $brregEntity->institutionalSectorCode->code);
    $this->assertEquals('Personlig næringsdrivende', $brregEntity->institutionalSectorCode->description);
    $this->assertTrue($brregEntity->registeredInTheRegisterOfBusinessEnterprises);
    $this->assertEquals(new \DateTimeImmutable('2024-01-13'), $brregEntity->registrationDate);
    $this->assertEquals('www.brreg.no', $brregEntity->website);
    $this->assertEquals('2024', $brregEntity->lastSubmittedAnnualAccountsYear);
    $this->assertEquals(['Utleier av bygg eller anlegg'], $brregEntity->voluntaryVatRegistryDescriptions);
    $this->assertTrue($brregEntity->underCompulsoryLiquidationOrDissolution);
    $this->assertEquals(50, $brregEntity->numberOfEmployees);
    $this->assertTrue($brregEntity->numberOfEmployeesIsRegistered);
    $this->assertEquals('376181782', $brregEntity->superiorEntityOrganizationNumber);
    $this->assertEquals('0000804843', $brregEntity->registrationNumberInNativeCountry);
    $this->assertEquals(new \DateTimeImmutable('2024-01-14'), $brregEntity->registrationOfNumberOfEmployeesInNavEmployersAndEmployeesDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-15'), $brregEntity->registrationOfNumberOfEmployeesDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-16'), $brregEntity->registrationInTheVatRegistryDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-17'), $brregEntity->registrationInTheVatRegistryInTheCcrDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-18'), $brregEntity->registrationInTheVoluntaryVatRegistryDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-19'), $brregEntity->registrationsInTheRegisterOfBusinessEnterprisesDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-20'), $brregEntity->registrationInTheRegisterOfNonProfitOrganizationsDate);
    $this->assertTrue($brregEntity->registeredInTheRegisterOfPoliticalParties);
    $this->assertEquals(new \DateTimeImmutable('2024-01-21'), $brregEntity->registeredInTheRegisterOfPoliticalPartiesDate);
    $this->assertEquals('epost@epost.com', $brregEntity->emailAddress);
    $this->assertEquals('91504800', $brregEntity->phoneNumber);
    $this->assertEquals('91504800', $brregEntity->mobilePhoneNumber);
  }

  /**
   * @return void
   * @throws BrregHttpException
   * @throws \JsonException
   */
  public function testFetchEntityByOrganizationNumber_withDeletedEntity_shouldThrowDeletedEntityException(): void {
    $httpClient = new MockHttpClient([JsonMockResponse::fromFile(__DIR__ . '/Mocks/BrregDeletedEntity.json')]);
    $client = new BrregEntityClient($httpClient);

    $exception = null;
    try {
      $client->fetchEntityByOrganizationNumber('509100675');
    } catch (BrregDeletedEntityException $e) {
      $exception = $e;
    }

    $this->assertNotNull($exception);
    $this->assertNotNull($exception->deletedEntity);
    $this->assertEquals('509100675', $exception->deletedEntity->organizationNumber);
    $this->assertEquals('Sesam stasjon', $exception->deletedEntity->name);
    $this->assertEquals('ASA', $exception->deletedEntity->organizationalForm->code);
    $this->assertEquals('Allmennaksjeselskap', $exception->deletedEntity->organizationalForm->description);
    $this->assertEquals(new \DateTimeImmutable('2024-01-04'), $exception->deletedEntity->organizationalForm->expirationDate);
    $this->assertEquals(new \DateTimeImmutable('2024-03-09'), $exception->deletedEntity->deletedDate);
  }

  /**
   * @return void
   * @throws BrregDeletedEntityException
   * @throws BrregHttpException
   */
  public function testFetchEntityByOrganizationNumber_withNotFoundEntity_shouldReturnNull(): void {
    $httpClient = new MockHttpClient([new MockResponse('', ['http_code' => Response::HTTP_NOT_FOUND])]);
    $client = new BrregEntityClient($httpClient);

    $entity = $client->fetchEntityByOrganizationNumber('509100675');

    $this->assertNull($entity);
  }

  /**
   * @return void
   * @throws BrregDeletedEntityException
   * @throws BrregHttpException
   * @throws \JsonException
   */
  public function testFetchSubEntityByOrganizationNumber_withSubEntity_shouldReturnSubEntity(): void {
    $httpClient = new MockHttpClient([JsonMockResponse::fromFile(__DIR__ . '/Mocks/BrregSubEntity.json')]);
    $client = new BrregEntityClient($httpClient);

    $brregSubEntity = $client->fetchSubEntityByOrganizationNumber('509100675');

    $this->assertNotNull($brregSubEntity);
    $this->assertNotNull($brregSubEntity);
    $this->assertEquals('509100675', $brregSubEntity->organizationNumber);
    $this->assertEquals('Sesam stasjon', $brregSubEntity->name);
    $this->assertEquals('BEDR', $brregSubEntity->organizationalForm->code);
    $this->assertEquals('Underenhet til næringsdrivende og offentlig forvaltning', $brregSubEntity->organizationalForm->description);
    $this->assertEquals(new \DateTimeImmutable('2024-01-03'), $brregSubEntity->organizationalForm->expirationDate);
    $this->assertNotNull($brregSubEntity->postalAddress);
    $this->assertEquals('Oslo', $brregSubEntity->postalAddress->municipalityName);
    $this->assertEquals('NO', $brregSubEntity->postalAddress->countryCode);
    $this->assertEquals('0010', $brregSubEntity->postalAddress->postalCode);
    $this->assertEquals(['Oslo'], $brregSubEntity->postalAddress->address);
    $this->assertEquals('Norge', $brregSubEntity->postalAddress->country);
    $this->assertEquals('0301', $brregSubEntity->postalAddress->municipalityNumber);
    $this->assertEquals('Oslo', $brregSubEntity->postalAddress->postalArea);
    $this->assertNotNull($brregSubEntity->locationPostalAddress);
    $this->assertEquals('Oslo', $brregSubEntity->locationPostalAddress->municipalityName);
    $this->assertEquals('NO', $brregSubEntity->locationPostalAddress->countryCode);
    $this->assertEquals('0010', $brregSubEntity->locationPostalAddress->postalCode);
    $this->assertEquals(['Oslo'], $brregSubEntity->locationPostalAddress->address);
    $this->assertEquals('Norge', $brregSubEntity->locationPostalAddress->country);
    $this->assertEquals('0301', $brregSubEntity->locationPostalAddress->municipalityNumber);
    $this->assertEquals('Oslo', $brregSubEntity->locationPostalAddress->postalArea);
    $this->assertTrue($brregSubEntity->registeredInTheVatRegistry);
    $this->assertEquals('41.109', $brregSubEntity->industrialCode1->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregSubEntity->industrialCode1->description);
    $this->assertEquals('41.109', $brregSubEntity->industrialCode2->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregSubEntity->industrialCode2->description);
    $this->assertEquals('41.109', $brregSubEntity->industrialCode3->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregSubEntity->industrialCode3->description);
    $this->assertEquals('70.100', $brregSubEntity->auxiliaryUnitCode->code);
    $this->assertEquals('Hovedkontortjenester', $brregSubEntity->auxiliaryUnitCode->description);
    $this->assertEquals(new \DateTimeImmutable('2024-01-13'), $brregSubEntity->registrationDate);
    $this->assertEquals('www.brreg.no', $brregSubEntity->website);
    $this->assertEquals(['Utleier av bygg eller anlegg'], $brregSubEntity->voluntaryVatRegistryDescriptions);
    $this->assertEquals(50, $brregSubEntity->numberOfEmployees);
    $this->assertTrue($brregSubEntity->numberOfEmployeesIsRegistered);
    $this->assertEquals('376181782', $brregSubEntity->superiorEntityOrganizationNumber);
    $this->assertEquals(new \DateTimeImmutable('2024-01-14'), $brregSubEntity->registrationOfNumberOfEmployeesInNavEmployersAndEmployeesDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-15'), $brregSubEntity->registrationOfNumberOfEmployeesDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-16'), $brregSubEntity->registrationInTheVatRegistryDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-17'), $brregSubEntity->registrationInTheVatRegistryInTheCcrDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-18'), $brregSubEntity->registrationInTheVoluntaryVatRegistryDate);
    $this->assertEquals('epost@epost.com', $brregSubEntity->emailAddress);
    $this->assertEquals('91504800', $brregSubEntity->phoneNumber);
    $this->assertEquals('91504800', $brregSubEntity->mobilePhoneNumber);
  }

  /**
   * @return void
   * @throws BrregHttpException
   * @throws \JsonException
   */
  public function testSearchEntities_WithResult_shouldReturnResult(): void {
    $httpClient = new MockHttpClient([JsonMockResponse::fromFile(__DIR__ . '/Mocks/BrregEntitiesSearchResult.json')]);
    $client = new BrregEntityClient($httpClient);

    $result = $client->searchEntities(new SearchEntitiesQueryFilter());

    $this->assertEquals(1, $result->page->number);
    $this->assertEquals(20, $result->page->size);
    $this->assertEquals(20, $result->page->totalPages);
    $this->assertEquals(100, $result->page->totalElements);
    $this->assertCount(1, $result->entities);

    $brregEntity = $result->entities[0];
    $this->assertNotNull($brregEntity);
    $this->assertEquals('509100675', $brregEntity->organizationNumber);
    $this->assertEquals('Sesam stasjon', $brregEntity->name);
    $this->assertEquals('ASA', $brregEntity->organizationalForm->code);
    $this->assertEquals('Allmennaksjeselskap', $brregEntity->organizationalForm->description);
    $this->assertEquals(new \DateTimeImmutable('2024-01-03'), $brregEntity->organizationalForm->expirationDate);
    $this->assertNotNull($brregEntity->postalAddress);
    $this->assertEquals('Oslo', $brregEntity->postalAddress->municipalityName);
    $this->assertEquals('NO', $brregEntity->postalAddress->countryCode);
    $this->assertEquals('0010', $brregEntity->postalAddress->postalCode);
    $this->assertEquals(['Oslo'], $brregEntity->postalAddress->address);
    $this->assertEquals('Norge', $brregEntity->postalAddress->country);
    $this->assertEquals('0301', $brregEntity->postalAddress->municipalityNumber);
    $this->assertEquals('Oslo', $brregEntity->postalAddress->postalArea);
    $this->assertNotNull($brregEntity->businessPostalAddress);
    $this->assertEquals('Oslo', $brregEntity->businessPostalAddress->municipalityName);
    $this->assertEquals('NO', $brregEntity->businessPostalAddress->countryCode);
    $this->assertEquals('0010', $brregEntity->businessPostalAddress->postalCode);
    $this->assertEquals(['Oslo'], $brregEntity->businessPostalAddress->address);
    $this->assertEquals('Norge', $brregEntity->businessPostalAddress->country);
    $this->assertEquals('0301', $brregEntity->businessPostalAddress->municipalityNumber);
    $this->assertEquals('Oslo', $brregEntity->businessPostalAddress->postalArea);
    $this->assertTrue($brregEntity->registeredInTheVatRegistry);
    $this->assertEquals('Bokmål', $brregEntity->languageForm);
    $this->assertEquals('41.109', $brregEntity->industrialCode1->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregEntity->industrialCode1->description);
    $this->assertEquals('41.109', $brregEntity->industrialCode2->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregEntity->industrialCode2->description);
    $this->assertEquals('41.109', $brregEntity->industrialCode3->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregEntity->industrialCode3->description);
    $this->assertEquals('70.100', $brregEntity->auxiliaryUnitCode->code);
    $this->assertEquals('Hovedkontortjenester', $brregEntity->auxiliaryUnitCode->description);
    $this->assertTrue($brregEntity->underLiquidation);
    $this->assertEquals(new \DateTimeImmutable('2024-01-04'), $brregEntity->underLiquidationDate);
    $this->assertTrue($brregEntity->registeredInTheFoundationRegister);
    $this->assertTrue($brregEntity->bankrupt);
    $this->assertEquals(new \DateTimeImmutable('2024-01-05'), $brregEntity->bankruptcyDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-06'), $brregEntity->liquidatedDueToLackOfDissolutionDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-07'), $brregEntity->liquidatedDueToLackOfManagingDirectorDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-08'), $brregEntity->liquidatedDueToLackOfAuditorDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-09'), $brregEntity->liquidatedDueToLackOfAccountsDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-10'), $brregEntity->liquidatedDueToDeficientBoardDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-11'), $brregEntity->statuesDate);
    $this->assertEquals(['Telekommunikasjonsvirksomhet'], $brregEntity->purpose);
    $this->assertEquals(['Telekommunikasjonsvirksomhet'], $brregEntity->activity);
    $this->assertCount(2, $brregEntity->remarks);
    $this->assertContainsOnlyInstancesOf(BrregRemarks::class, $brregEntity->remarks);
    $this->assertEquals('NAVN', $brregEntity->remarks[0]->infoType);
    $this->assertEquals('Påtegning på navn', $brregEntity->remarks[0]->text);
    $this->assertEquals(new \DateTimeImmutable('2024-01-01'), $brregEntity->remarks[0]->introductionDate);
    $this->assertEquals('FADR', $brregEntity->remarks[1]->infoType);
    $this->assertEquals('Påtegning på forretningsadresse', $brregEntity->remarks[1]->text);
    $this->assertEquals(new \DateTimeImmutable('2024-01-02'), $brregEntity->remarks[1]->introductionDate);
    $this->assertTrue($brregEntity->registeredInTheRegisterOfNonProfitOrganizations);
    $this->assertEquals(new \DateTimeImmutable('2024-01-12'), $brregEntity->foundationDate);
    $this->assertNotNull($brregEntity->institutionalSectorCode);
    $this->assertEquals('8200', $brregEntity->institutionalSectorCode->code);
    $this->assertEquals('Personlig næringsdrivende', $brregEntity->institutionalSectorCode->description);
    $this->assertTrue($brregEntity->registeredInTheRegisterOfBusinessEnterprises);
    $this->assertEquals(new \DateTimeImmutable('2024-01-13'), $brregEntity->registrationDate);
    $this->assertEquals('www.brreg.no', $brregEntity->website);
    $this->assertEquals('2024', $brregEntity->lastSubmittedAnnualAccountsYear);
    $this->assertEquals(['Utleier av bygg eller anlegg'], $brregEntity->voluntaryVatRegistryDescriptions);
    $this->assertTrue($brregEntity->underCompulsoryLiquidationOrDissolution);
    $this->assertEquals(50, $brregEntity->numberOfEmployees);
    $this->assertTrue($brregEntity->numberOfEmployeesIsRegistered);
    $this->assertEquals('376181782', $brregEntity->superiorEntityOrganizationNumber);
    $this->assertEquals('0000804843', $brregEntity->registrationNumberInNativeCountry);
    $this->assertEquals(new \DateTimeImmutable('2024-01-14'), $brregEntity->registrationOfNumberOfEmployeesInNavEmployersAndEmployeesDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-15'), $brregEntity->registrationOfNumberOfEmployeesDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-16'), $brregEntity->registrationInTheVatRegistryDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-17'), $brregEntity->registrationInTheVatRegistryInTheCcrDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-18'), $brregEntity->registrationInTheVoluntaryVatRegistryDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-19'), $brregEntity->registrationsInTheRegisterOfBusinessEnterprisesDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-20'), $brregEntity->registrationInTheRegisterOfNonProfitOrganizationsDate);
    $this->assertTrue($brregEntity->registeredInTheRegisterOfPoliticalParties);
    $this->assertEquals(new \DateTimeImmutable('2024-01-21'), $brregEntity->registeredInTheRegisterOfPoliticalPartiesDate);
    $this->assertEquals('epost@epost.com', $brregEntity->emailAddress);
    $this->assertEquals('91504800', $brregEntity->phoneNumber);
    $this->assertEquals('91504800', $brregEntity->mobilePhoneNumber);
  }

  /**
   * @return void
   * @throws BrregHttpException
   * @throws \JsonException
   */
  public function testSearchSubEntities_WithResult_shouldReturnResult(): void {
    $httpClient = new MockHttpClient([JsonMockResponse::fromFile(__DIR__ . '/Mocks/BrregSubEntitiesSearchResult.json')]);
    $client = new BrregEntityClient($httpClient);

    $result = $client->searchSubEntities(new SearchEntitiesQueryFilter());

    $this->assertEquals(1, $result->page->number);
    $this->assertEquals(20, $result->page->size);
    $this->assertEquals(20, $result->page->totalPages);
    $this->assertEquals(100, $result->page->totalElements);
    $this->assertCount(1, $result->entities);

    $brregSubEntity = $result->entities[0];
    $this->assertNotNull($brregSubEntity);
    $this->assertEquals('509100675', $brregSubEntity->organizationNumber);
    $this->assertEquals('Sesam stasjon', $brregSubEntity->name);
    $this->assertEquals('BEDR', $brregSubEntity->organizationalForm->code);
    $this->assertEquals('Underenhet til næringsdrivende og offentlig forvaltning', $brregSubEntity->organizationalForm->description);
    $this->assertEquals(new \DateTimeImmutable('2024-01-03'), $brregSubEntity->organizationalForm->expirationDate);
    $this->assertNotNull($brregSubEntity->postalAddress);
    $this->assertEquals('Oslo', $brregSubEntity->postalAddress->municipalityName);
    $this->assertEquals('NO', $brregSubEntity->postalAddress->countryCode);
    $this->assertEquals('0010', $brregSubEntity->postalAddress->postalCode);
    $this->assertEquals(['Oslo'], $brregSubEntity->postalAddress->address);
    $this->assertEquals('Norge', $brregSubEntity->postalAddress->country);
    $this->assertEquals('0301', $brregSubEntity->postalAddress->municipalityNumber);
    $this->assertEquals('Oslo', $brregSubEntity->postalAddress->postalArea);
    $this->assertNotNull($brregSubEntity->locationPostalAddress);
    $this->assertEquals('Oslo', $brregSubEntity->locationPostalAddress->municipalityName);
    $this->assertEquals('NO', $brregSubEntity->locationPostalAddress->countryCode);
    $this->assertEquals('0010', $brregSubEntity->locationPostalAddress->postalCode);
    $this->assertEquals(['Oslo'], $brregSubEntity->locationPostalAddress->address);
    $this->assertEquals('Norge', $brregSubEntity->locationPostalAddress->country);
    $this->assertEquals('0301', $brregSubEntity->locationPostalAddress->municipalityNumber);
    $this->assertEquals('Oslo', $brregSubEntity->locationPostalAddress->postalArea);
    $this->assertTrue($brregSubEntity->registeredInTheVatRegistry);
    $this->assertEquals('41.109', $brregSubEntity->industrialCode1->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregSubEntity->industrialCode1->description);
    $this->assertEquals('41.109', $brregSubEntity->industrialCode2->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregSubEntity->industrialCode2->description);
    $this->assertEquals('41.109', $brregSubEntity->industrialCode3->code);
    $this->assertEquals('Utvikling og salg av egen fast eiendom ellers', $brregSubEntity->industrialCode3->description);
    $this->assertEquals('70.100', $brregSubEntity->auxiliaryUnitCode->code);
    $this->assertEquals('Hovedkontortjenester', $brregSubEntity->auxiliaryUnitCode->description);
    $this->assertEquals(new \DateTimeImmutable('2024-01-13'), $brregSubEntity->registrationDate);
    $this->assertEquals('www.brreg.no', $brregSubEntity->website);
    $this->assertEquals(['Utleier av bygg eller anlegg'], $brregSubEntity->voluntaryVatRegistryDescriptions);
    $this->assertEquals(50, $brregSubEntity->numberOfEmployees);
    $this->assertTrue($brregSubEntity->numberOfEmployeesIsRegistered);
    $this->assertEquals('376181782', $brregSubEntity->superiorEntityOrganizationNumber);
    $this->assertEquals(new \DateTimeImmutable('2024-01-14'), $brregSubEntity->registrationOfNumberOfEmployeesInNavEmployersAndEmployeesDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-15'), $brregSubEntity->registrationOfNumberOfEmployeesDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-16'), $brregSubEntity->registrationInTheVatRegistryDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-17'), $brregSubEntity->registrationInTheVatRegistryInTheCcrDate);
    $this->assertEquals(new \DateTimeImmutable('2024-01-18'), $brregSubEntity->registrationInTheVoluntaryVatRegistryDate);
    $this->assertEquals('epost@epost.com', $brregSubEntity->emailAddress);
    $this->assertEquals('91504800', $brregSubEntity->phoneNumber);
    $this->assertEquals('91504800', $brregSubEntity->mobilePhoneNumber);
  }

}
