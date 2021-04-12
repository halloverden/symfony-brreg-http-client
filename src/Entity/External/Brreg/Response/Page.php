<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response;


use JMS\Serializer\Annotation as Serializer;

class Page {

  /**
   * @var int
   *
   * @Serializer\SerializedName("size")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization","Serialization"})
   */
  private $size;

  /**
   * @var int
   *
   * @Serializer\SerializedName("totalElements")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization","Serialization"})
   */
  private $totalElements;

  /**
   * @var int
   *
   * @Serializer\SerializedName("totalPages")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization","Serialization"})
   */
  private $totalPages;

  /**
   * @var int
   *
   * @Serializer\SerializedName("number")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization","Serialization"})
   */
  private $number;

  /**
   * @return int
   */
  public function getSize(): int {
    return $this->size;
  }

  /**
   * @return int
   */
  public function getTotalPages(): int {
    return $this->totalPages;
  }

  /**
   * @return int
   */
  public function getTotalElements(): int {
    return $this->totalElements;
  }

  /**
   * @return int
   */
  public function getNumber(): int {
    return $this->number;
  }

}
