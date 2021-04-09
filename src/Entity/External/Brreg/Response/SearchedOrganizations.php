<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Organization;
use JMS\Serializer\Annotation as Serializer;

class SearchedOrganizations {

  /**
   * @var Collection<Organization>|Organization[]|null
   *
   * @Serializer\SerializedName("enheter")
   * @Serializer\Type(name="ArrayCollection<HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Organization>")
   * @Serializer\Groups({"Deserialization"})
   */
  private $organizations;

  public function __construct() {
    $this->organizations = new ArrayCollection();
  }

  /**
   * @return Organization[]|Collection<Organization>|null
   */
  public function getOrganizations(): ?Collection {
    return $this->organizations;
  }

}
