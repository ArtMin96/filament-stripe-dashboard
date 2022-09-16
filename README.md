# This is my package filament-stripe-dashboard

[![Latest Version on Packagist](https://img.shields.io/packagist/v/artmin96/filament-stripe-dashboard.svg?style=flat-square)](https://packagist.org/packages/artmin96/filament-stripe-dashboard)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/artmin96/filament-stripe-dashboard/run-tests?label=tests)](https://github.com/artmin96/filament-stripe-dashboard/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/artmin96/filament-stripe-dashboard/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/artmin96/filament-stripe-dashboard/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/artmin96/filament-stripe-dashboard.svg?style=flat-square)](https://packagist.org/packages/artmin96/filament-stripe-dashboard)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

Filtering only visible records.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/filament-stripe-dashboard.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/filament-stripe-dashboard)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require artmin96/filament-stripe-dashboard
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-stripe-dashboard-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-stripe-dashboard-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-stripe-dashboard-views"
```

## Usage

```php
$filamentStripeDashboard = new ArtMin96\FilamentStripeDashboard();
echo $filamentStripeDashboard->echoPhrase('Hello, ArtMin96!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Arthur Minasyan](https://github.com/ArtMin96)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
