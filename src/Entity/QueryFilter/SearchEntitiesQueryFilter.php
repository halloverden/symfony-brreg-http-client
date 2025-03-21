<?php

namespace HalloVerden\BrregHttpClient\Entity\QueryFilter;

final class SearchEntitiesQueryFilter {
  private ?string $name = null;
  private array $organizationNumbers = [];
  private ?int $pageSize = null;
  private ?int $page = null;

  public function name(string $name): self {
    $this->name = $name;
    return $this;
  }

  public function organizationNumber(string $organizationNumber): self {
    $this->organizationNumbers[] = $organizationNumber;
    return $this;
  }

  public function pageSize(int $pageSize): self {
    $this->pageSize = $pageSize;
    return $this;
  }

  public function page(int $page): self {
    $this->page = $page;
    return $this;
  }

  public function toArray(): array {
    return \array_filter([
      'navn' => $this->name,
      'organisasjonsnummer' => $this->organizationNumbers ? \implode(',', $this->organizationNumbers) : null,
      'size' => $this->pageSize,
      'page' => $this->page,
    ]);
  }

}
