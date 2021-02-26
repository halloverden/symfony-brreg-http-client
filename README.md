# Symfony Brreg Http Client

Symfony [Http Client](https://symfony.com/doc/current/http_client.html) for the Open Brreg REST Api for the [Organization Registry](https://www.brreg.no/produkter-og-tjenester/apne-data/beskrivelse-av-tjenesten-data-fra-enhetsregisteret/).

## Installation

Via composer:

```console
$ composer require halloverden/symfony-brreg-http-client
```

## Usage

In your `services.yaml`, set 
```yaml
HalloVerden\BrregHttpClient\Interfaces\BrregServiceInterface:
    class: HalloVerden\BrregHttpClient\Services\BrregService
```
In your class, inject the BrregServiceInterface class:
```injectablephp
class TestService {

  /**
   * @var BrregServiceInterface
   */
  private BrregServiceInterface $service;

  public function __construct(BrregServiceInterface $service) {
    $this->service = $service;
  }

  /**
   * @param int $organizationNumber
   * @param $fetchParentsIfPresent
   * 
   * @return Organization|null
   */
  public function test(int $organizationNumber, $fetchParentsIfPresent): ?Organization {
    return $this->service->findOrganizationByOrganizationNumber($organizationNumber, $fetchParentsIfPresent);
  }
}
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
