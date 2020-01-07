# Index pages in Google using this package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/famdirksen/laravel-google-indexing.svg?style=flat-square)](https://packagist.org/packages/famdirksen/laravel-google-indexing)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/famdirksen/laravel-google-indexing/run-tests?label=tests)](https://github.com/famdirksen/laravel-google-indexing/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Quality Score](https://img.shields.io/scrutinizer/g/famdirksen/laravel-google-indexing.svg?style=flat-square)](https://scrutinizer-ci.com/g/famdirksen/laravel-google-indexing)
[![Total Downloads](https://img.shields.io/packagist/dt/famdirksen/laravel-google-indexing.svg?style=flat-square)](https://packagist.org/packages/famdirksen/laravel-google-indexing)

Request a page to be indexed by Google using the [Indexing API](https://developers.google.com/search/apis/indexing-api/v3/quickstart).

Please, take a note at the allowed pages that can be index using this API at https://developers.google.com/search/apis/indexing-api/v3/quickstart.

## Installation

You can install the package via composer:

```bash
composer require famdirksen/laravel-google-indexing
```

## Usage

``` php
$skeleton = new Famdirksen\LaravelGoogleIndexing();
echo $skeleton->echoPhrase('Hello, Famdirksen!');
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@famdirksen.nl instead of using the issue tracker.

## Credits

- [Robin Dirksen](https://github.com/robindirksen1)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
