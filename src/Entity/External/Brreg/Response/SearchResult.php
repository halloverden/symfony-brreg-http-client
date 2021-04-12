<?php


namespace HalloVerden\BrregHttpClient\Entity\External\Brreg\Response;


use HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links\Links;
use JMS\Serializer\Annotation as Serializer;

class SearchResult {

  /**
   * @var SearchedOrganizations
   *
   * @Serializer\SerializedName("_embedded")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\SearchedOrganizations")
   * @Serializer\Groups({"Deserialization"})
   */
  private $searchedOrganizations;

  /**
   * @var Links
   *
   * @Serializer\SerializedName("_links")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Links\Links")
   * @Serializer\Groups({"Deserialization"})
   */
  private $links;

  /**
   * @var Page
   *
   * @Serializer\SerializedName("page")
   * @Serializer\Type(name="HalloVerden\BrregHttpClient\Entity\External\Brreg\Response\Page")
   * @Serializer\Groups({"Deserialization"})
   */
  private $page;

  /**
   * @return SearchedOrganizations
   */
  public function getSearchedOrganizations(): SearchedOrganizations {
    return $this->searchedOrganizations;
  }

  /**
   * @return Links
   */
  public function getLinks(): Links {
    return $this->links;
  }

  /**
   * @return Page
   */
  public function getPage(): Page {
    return $this->page;
  }

}
