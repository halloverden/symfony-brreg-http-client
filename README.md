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
HalloVerden\BrregHttpClient\BrregEntityClientInterface:
    class: HalloVerden\BrregHttpClient\BrregEntityClient
```

In your class, inject the `BrregEntityClientInterface` interface:
```injectablephp
readonly final class TestService {

  public function __construct(private BrregEntityClientInterface $client) {
  }

  public function test(string $organizationNumber): BrregEntity {
    return $this->client->fetchEntityByOrganizationNumber($organizationNumber);
  }

}
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
