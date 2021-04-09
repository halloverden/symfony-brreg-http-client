<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response;


use JMS\Serializer\Annotation as Serializer;

class Page {

  /**
   * @var int
   *
   * @Serializer\Type(name="integer")
   */
  private $size;

  /**
   * @var int
   *
   * @Serializer\Type(name="integer")
   */
  private $totalElements;

  /**
   * @var int
   *
   * @Serializer\Type(name="integer")
   */
  private $totalPages;

  /**
   * @var int
   *
   * @Serializer\Type(name="integer")
   */
  private $number;
}
