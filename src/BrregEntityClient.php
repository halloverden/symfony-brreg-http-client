<?php

namespace HalloVerden\BrregHttpClient;

use HalloVerden\BrregHttpClient\Entity\AbstractBrregEntity;
use HalloVerden\BrregHttpClient\Entity\BrregDeletedEntity;
use HalloVerden\BrregHttpClient\Entity\BrregEntity;
use HalloVerden\BrregHttpClient\Entity\BrregSubEntity;
use HalloVerden\BrregHttpClient\Entity\EntitySearch\BrregEntitiesSearchResult;
use HalloVerden\BrregHttpClient\Entity\EntitySearch\BrregSubEntitiesSearchResult;
use HalloVerden\BrregHttpClient\Entity\QueryFilter\SearchEntitiesQueryFilter;
use HalloVerden\BrregHttpClient\Exception\BrregDeletedEntityException;
use HalloVerden\BrregHttpClient\Exception\BrregHttpException;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\HttpOptions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final readonly class BrregEntityClient implements BrregEntityClientInterface {
  private const string BASE_URI = 'https://data.brreg.no/enhetsregisteret/api/';

  private SerializerInterface $serializer;
  private HttpClientInterface $client;

  public function __construct(
    ?HttpClientInterface $client = null,
    ?SerializerInterface $serializer = null,
  ) {
    $client ??= HttpClient::create();
    $this->client = $client->withOptions(
      new HttpOptions()
        ->setBaseUri(self::BASE_URI)
        ->toArray()
    );

    $this->serializer = $serializer ?? SerializerBuilder::create()->build();
  }

  /**
   * @inheritDoc
   */
  public function fetchEntityByOrganizationNumber(string $organizationNumber): ?BrregEntity {
    $entity = $this->fetchAbstractEntity(\sprintf('enheter/%s', $organizationNumber));
    if (null === $entity) {
      return null;
    }

    if ($entity instanceof BrregDeletedEntity) {
      throw new BrregDeletedEntityException($entity);
    }

    if (!$entity instanceof BrregEntity) {
      throw new \LogicException('$entity should be instance of BrregEntity at this point.');
    }

    return $entity;
  }

  /**
   * @inheritDoc
   */
  public function fetchSubEntityByOrganizationNumber(string $organizationNumber): ?BrregSubEntity {
    $entity = $this->fetchAbstractEntity(\sprintf('underenheter/%s', $organizationNumber));
    if (null === $entity) {
      return null;
    }

    if ($entity instanceof BrregDeletedEntity) {
      throw new BrregDeletedEntityException($entity);
    }

    if (!$entity instanceof BrregSubEntity) {
      throw new \LogicException('$entity should be instance of BrregEntity at this point.');
    }

    return $entity;
  }

  /**
   * @inheritDoc
   */
  public function searchEntities(SearchEntitiesQueryFilter $filter): BrregEntitiesSearchResult {
    try {
      $response = $this->client->request(Request::METHOD_GET, 'enheter', [
        'query' => $filter->toArray(),
      ]);
      $content = $response->getContent();
    } catch (ExceptionInterface $exception) {
      throw new BrregHttpException($exception->getMessage(), previous: $exception);
    }

    return $this->serializer->deserialize($content, BrregEntitiesSearchResult::class, 'json');
  }

  /**
   * @inheritDoc
   */
  public function searchSubEntities(SearchEntitiesQueryFilter $filter): BrregSubEntitiesSearchResult {
    try {
      $response = $this->client->request(Request::METHOD_GET, 'underenheter', [
        'query' => $filter->toArray(),
      ]);
      $content = $response->getContent();
    } catch (ExceptionInterface $exception) {
      throw new BrregHttpException($exception->getMessage(), previous: $exception);
    }

    return $this->serializer->deserialize($content, BrregSubEntitiesSearchResult::class, 'json');
  }

  /**
   * @param string $path
   *
   * @return AbstractBrregEntity|null
   * @throws BrregDeletedEntityException
   * @throws BrregHttpException
   */
  private function fetchAbstractEntity(string $path): ?AbstractBrregEntity {
    try {
      $response = $this->client->request(Request::METHOD_GET, $path);
      $content = $response->getContent();
    } catch (ClientExceptionInterface $exception) {
      if (Response::HTTP_NOT_FOUND === $exception->getCode()) {
        return null;
      }

      if (Response::HTTP_GONE === $exception->getCode()) {
        throw new BrregDeletedEntityException();
      }

      throw new BrregHttpException($exception->getMessage(), previous: $exception);
    } catch (ExceptionInterface $exception) {
      throw new BrregHttpException($exception->getMessage(), previous: $exception);
    }

    return $this->serializer->deserialize($content, AbstractBrregEntity::class, 'json');
  }

}
