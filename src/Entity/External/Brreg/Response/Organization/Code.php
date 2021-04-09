<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class BusinessCode
 * @package HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization
 */
class Code {

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("kode")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $kode;

  /**
   * @var string|null
   *
   * @Serializer\SerializedName("beskrivelse")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $beskrivelse;

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("code")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string|null
   */
  public function getCode(): ?string {
    return $this->kode;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("description")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string|null
   */
  public function getDescription(): ?string {
    return $this->beskrivelse;
  }



}
