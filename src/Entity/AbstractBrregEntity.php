<?php

namespace HalloVerden\BrregHttpClient\Entity;

use JMS\Serializer\Annotation\Discriminator;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @internal
 */
#[Discriminator(field: 'respons_klasse', map: self::DISCRIMINATOR)]
abstract readonly class AbstractBrregEntity {
  private const string TYPE_ENTITY = 'Enhet';
  private const string TYPE_DELETED_ENTITY = 'SlettetEnhet';
  private const string TYPE_SUB_ENTITY = 'Underenhet';

  private const array DISCRIMINATOR = [
    self::TYPE_ENTITY => BrregEntity::class,
    self::TYPE_DELETED_ENTITY => BrregDeletedEntity::class,
    self::TYPE_SUB_ENTITY => BrregSubEntity::class,
  ];

  public function __construct(
    #[SerializedName('organisasjonsnummer')]
    public string                  $organizationNumber,

    #[SerializedName('navn')]
    public string                  $name,

    #[SerializedName('organisasjonsform')]
    public BrregOrganizationalForm $organizationalForm,
  ) {
  }

}
