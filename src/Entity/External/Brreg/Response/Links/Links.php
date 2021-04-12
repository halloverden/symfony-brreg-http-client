<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links;


use JMS\Serializer\Annotation as Serializer;

class Links {

  /**
   * @var Link
   *
   * @Serializer\SerializedName("first")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links\Link")
   * @Serializer\Groups({"Deserialization","Serialization","Links"})
   */
  private $first;

  /**
   * @var Link
   *
   * @Serializer\SerializedName("self")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links\Link")
   * @Serializer\Groups({"Deserialization","Serialization","Links"})
   */
  private $self;

  /**
   * @var Link
   *
   * @Serializer\SerializedName("next")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links\Link")
   * @Serializer\Groups({"Deserialization","Serialization","Links"})
   */
  private $next;

  /**
   * @var Link
   *
   * @Serializer\SerializedName("last")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links\Link")
   * @Serializer\Groups({"Deserialization","Serialization","Links"})
   */
  private $last;

  /**
   * @return Link
   */
  public function getFirst(): Link {
    return $this->first;
  }

  /**
   * @return Link
   */
  public function getSelf(): Link {
    return $this->self;
  }

  /**
   * @return Link
   */
  public function getNext(): Link {
    return $this->next;
  }

  /**
   * @return Link
   */
  public function getLast(): Link {
    return $this->last;
  }

}
