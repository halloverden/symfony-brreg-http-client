<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links;


use JMS\Serializer\Annotation as Serializer;

class Link {

  /**
   * @var string
   *
   * @Serializer\SerializedName("href")
   * @Serializer\Type(name="string")
   * @Serializer\Groups({"Deserialization","Serialization"})
   */
  private $href;

  /**
   * @return string
   */
  public function getHref(): string {
    return $this->href;
  }


}
