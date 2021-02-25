<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class OrganizationForm
 * @package HalloVerden\BrregHttpClient\Entity\External\Brreg\Response
 */
class OrganizationForm {

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("kode")
   * @Serializer\Type(name="string")
   * @Serializer\Expose()
   */
  private $code;
  /**
   * @var string|null
   *
   * @Serializer\SerializedName("beskrivelse")
   * @Serializer\Type(name="string")
   * @Serializer\Expose()
   */
  private $description;

}
