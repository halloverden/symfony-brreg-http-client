<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Error;


use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as Serializer;

class MalformedRequestResponse {

  /**
   * @var int
   *
   * @Serializer\SerializedName("tidsstempel")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $tidsstempel;

  /**
   * @var int
   *
   * @Serializer\SerializedName("status")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $status;

  /**
   * @var string
   *
   * @Serializer\SerializedName("feilmelding")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $feilmelding;

  /**
   * @var string
   *
   * @Serializer\SerializedName("sti")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $sti;
  /**
   * @var int
   *
   * @Serializer\SerializedName("antallFeil")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $antallFeil;

  /**
   * @var Collection<ValidationError>|ValidationError[]|null
   *
   * @Serializer\SerializedName("valideringsfeil")
   * @Serializer\Type(name="ArrayCollection<HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Error\ValidationError>")
   * @Serializer\Groups({"Deserialization"})
   */
  protected $valideringsfeil;

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("timestamp")
   * @Serializer\Type(name="int")
   * @Serializer\Groups({"Serialization"})
   *
   * @return int
   */
  public function getTimestamp(): int {
    return $this->tidsstempel;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("status")
   * @Serializer\Type(name="int")
   * @Serializer\Groups({"Serialization"})
   *
   * @return int
   */
  public function getStatus(): int {
    return $this->status;
  }

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
   * @Serializer\SerializedName("path")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return string
   */
  public function getPath(): string {
    return $this->sti;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("errorNumber")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Serialization"})
   *
   * @return int
   */
  public function getErrorNumber(): int {
    return $this->antallFeil;
  }

  /**
   * @Serializer\VirtualProperty()
   * @Serializer\SerializedName("name")
   * @Serializer\Type(name="ArrayCollection<HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Error\ValidationError>")
   * @Serializer\Groups({"Serialization"})
   *
   * @return Collection
   */
  public function getValidationErrors(): Collection {
    return $this->valideringsfeil;
  }

}
