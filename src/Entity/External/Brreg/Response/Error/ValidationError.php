<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Error;


use JMS\Serializer\Annotation as Serializer;

class ValidationError {

  /**
   * @var string
   *
   * @Serializer\SerializedName("feilmelding")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $feilmelding;
  /**
   * @var array
   *
   * @Serializer\SerializedName("parametere")
   * @Serializer\Type(name="array")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $parametere;
  /**
   * @var string
   *
   * @Serializer\SerializedName("feilaktigVerdi")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $feilaktigVerdi;

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("errorMessage")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string
   */
  public function getErrorMessage(): string {
    return $this->feilmelding;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("parameters")
   * @Serializer\Type(name="array")
   * @Serializer\Groups({"Serialization"})
   *
   * @return array
   */
  public function getParameters(): array {
    return $this->parametere;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("malformedValue")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string
   */
  public function getMalformedValue(): string {
    return $this->feilaktigVerdi;
  }


}
