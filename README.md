# HTTP Logger

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Total Downloads][ico-downloads]][link-downloads]
<!-- [![Build Status][ico-travis]][link-travis] -->
<!-- [![Coverage Status][ico-scrutinizer]][link-scrutinizer] -->
<!-- [![Quality Score][ico-code-quality]][link-code-quality] -->

This is a set of interfaces, the implementations of which are presented for example or are completely stubs.

## Highlights

- Simple API
- Framework Agnostic
- Composer ready, [PSR-2][] and [PSR-4][] compliant

## System Requirements

You need:

- **PHP >= 7.2.0** but the latest stable version of PHP is recommended

## Install

Via Composer

``` bash
$ composer require cryonighter/http-logger
```

## Usage

``` php
use Cryonighter\HttpLogger\StreamHttpLogger;
use Cryonighter\HttpLogger\Formatter\PlainTextFormatter;
use Cryonighter\HttpLogger\Handler\DefaultRequestHandler;
use Cryonighter\HttpLogger\Handler\DefaultResponseHandler;

$logger = new StreamHttpLogger(STDOUT, new PlainTextFormatter(), new DefaultRequestHandler(), new DefaultResponseHandler());

$logger->logRequest($protocolVersion, $method, $uri, $headers, $body);
$logger->logResponse($protocolVersion, $code, $reason, $headers, $body);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ php vendor/phpunit/phpunit/phpunit tests
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email `cryonighter@yandex.ru` instead of using the issue tracker.

## Credits

- [Andrey Reshetchenko][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[PSR-2]: http://www.php-fig.org/psr/psr-2/
[PSR-4]: http://www.php-fig.org/psr/psr-4/

[ico-version]: https://img.shields.io/packagist/v/cryonighter/http-logger.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/cryonighter/http-logger/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/cryonighter/http-logger.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/cryonighter/http-logger.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/cryonighter/http-logger.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/cryonighter/http-logger
[link-travis]: https://travis-ci.org/cryonighter/http-logger
[link-scrutinizer]: https://scrutinizer-ci.com/g/cryonighter/http-logger/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/cryonighter/http-logger
[link-downloads]: https://packagist.org/packages/cryonighter/http-logger
[link-author]: https://github.com/cryonighter
[link-contributors]: ../../contributors
