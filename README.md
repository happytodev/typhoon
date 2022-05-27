
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Content Management with flat database, using TALL Stack

[![Latest Version on Packagist](https://img.shields.io/packagist/v/happytodev/flat-cms.svg?style=flat-square)](https://packagist.org/packages/happytodev/flat-cms)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/happytodev/flat-cms/run-tests?label=tests)](https://github.com/happytodev/flat-cms/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/happytodev/flat-cms/Check%20&%20fix%20styling?label=code%20style)](https://github.com/happytodev/flat-cms/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/happytodev/flat-cms.svg?style=flat-square)](https://packagist.org/packages/happytodev/flat-cms)

Flat-Cms is a way to manage your content as you want.
Why Flat ? Because he doesn't use database. It uses Orbit.

## Support us



## Installation

You can install the package via composer:

```bash
composer require happytodev/flat-cms
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="flat-cms-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="flat-cms-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="flat-cms-views"
```

## Usage

```php
$flatCms = new happytodev\FlatCms();
echo $flatCms->echoPhrase('Hello, happytodev!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Frédéric Blanc](https://github.com/happytodev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
