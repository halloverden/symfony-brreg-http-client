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
  private $organizationUnits;

  /**
   * @var Collection<Organization>|Organization[]|null
   *
   * @Serializer\SerializedName("underenheter")
   * @Serializer\Type(name="ArrayCollection<HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Organization\Organization>")
   * @Serializer\Groups({"Deserialization"})
   */
  private $organizationSubunits;

  public function __construct() {
    $this->organizationUnits = new ArrayCollection();
    $this->organizationSubunits = new ArrayCollection();
  }

  /**
   * @return Collection|Organization[]
   */
  public function getOrganizationUnits(): Collection {
    return $this->organizationUnits ?? new ArrayCollection();
  }

  /**
   * @return Collection|Organization[]
   */
  public function getOrganizationSubunits(): Collection {
    return $this->organizationSubunits ?? new ArrayCollection();
  }

  /**
   * @return Organization[]|Collection<Organization>
   */
  public function getOrganizations(): Collection {
    return new ArrayCollection(array_merge($this->organizationUnits->toArray(),$this->organizationSubunits->toArray()));
  }

}
