<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response;


use JMS\Serializer\Annotation as Serializer;

class Page {

  /**
   * @var int
   *
   * @Serializer\SerializedName("size")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization"})
   */
  private $size;

  /**
   * @var int
   *
   * @Serializer\SerializedName("totalElements")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization"})
   */
  private $totalElements;

  /**
   * @var int
   *
   * @Serializer\SerializedName("totalPages")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization"})
   */
  private $totalPages;

  /**
   * @var int
   *
   * @Serializer\SerializedName("number")
   * @Serializer\Type(name="integer")
   * @Serializer\Groups({"Deserialization"})
   */
  private $number;

  /**
   * @return int
   */
  public function getTotalElements(): int {
    return $this->totalElements;
  }
}
