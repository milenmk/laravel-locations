# Laravel Locations

<div align="center">

<a href="https://packagist.org/packages/milenmk/laravel-locations">![Latest Version on Packagist](https://img.shields.io/packagist/v/milenmk/laravel-locations.svg?style=flat)</a>
<a href="https://packagist.org/packages/milenmk/laravel-locations">![Total Downloads](https://img.shields.io/packagist/dt/milenmk/laravel-locations.svg?style=flat)</a>
<a href="https://github.com/milenmk/laravel-locations">![GitHub User's stars](https://img.shields.io/github/stars/milenmk/laravel-locations)</a>
<a href="https://laravel.com/docs">![Laravel 10 Support](https://img.shields.io/badge/Laravel-10.x|11.x|12.x-orange?style=flat&logo=laravel)</a>
<a href="https://www.php.net">![PHP Version Support](https://img.shields.io/packagist/php-v/milenmk/laravel-locations?style=flat)</a>
<a href="https://github.com/milenmk/laravel-locations/blob/develop/LICENSE.md">![License](https://img.shields.io/packagist/l/milenmk/laravel-locations.svg?style=flat)</a>
<a href="https://github.com/milenmk/laravel-locations/issues">![Contributions Welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)</a>
<a href="https://www.patreon.com/c/LaravelAddonsbyMilen">![Sponsor me](https://img.shields.io/badge/Sponsor-%E2%9D%A4-ff69b4?style=flat)</a>

</div>

Laravel Locations provides a large database with Countries, Cities, Areas, Languages and Currencies models to your Laravel application

The package is ideal for applications that need:

- Country/region selection dropdowns
- Address validation and normalization
- Multi-language support for location names
- Currency conversion functionality
- Location-based features and filtering

### Database Contents

- 250 Countries
- 5038 Cities (States/Regions)
- 149,350 Areas (subdivisions of Cities/States)

You can access this data either via the **Eloquent models** or directly through the **JSON files** included in the package.

By default, all records are active (`is_activated = 1`). You can filter active records using the **`activated()` scope**.

> **Deprecated:** `getActive()` method is deprecated since v1.4.0. Use `activated()` scope instead.

---

## Requirements

- PHP 8.2 or higher
- Laravel 9.x or higher

## Install

Run the following commands:

- to install the package

```copy
composer require milenmk/laravel-locations
```

- to publish the migrations

```copy
php artisan milenmk-locations:install
```

- to seed the database tables with the data included in the JSON files

```copy
php artisan milenmk-locations:seed
```

When the commands are run, the database tables for the models will be created, and then they will be seeded with
the data included in the JSON files.

### For version 1.3+

If you have a previous version installed, run this command to update the country table and add the translations:

```copy
php artisan milenmk-locations:update-countries-translations
```

[USAGE](documentation/usage.md)

[EXAMPLES](documentation/examples.md)

[PERFORMANCE](documentation/performance.md)

[MODELS](documentation/models.md)

## DISCLAIMER

This package is provided "as is" without warranty of any kind, either express or implied, including but not limited to the warranties of merchantability, fitness for a particular
purpose, or noninfringement.

The author(s) makes no representations or warranties regarding the accuracy, reliability or completeness of the code or its suitability for any specific use case. It is recommended
that you thoroughly test this package in your environment before deploying it to production.

By using this package, you acknowledge and agree that the author(s) shall not be held liable for any damages, losses or other issues arising from the use of this software.

## Contributing

You can review the source code, report bugs, or contribute to the project by visiting the GitHub repository:

[GitHub Repository](https://github.com/milenmk/laravel-livewire-crud)

Feel free to open issues or submit pull requests. Contributions are welcome!

## Changelog

Please see [CHANGELOG.md](CHANGELOG.md) for more information on what has changed recently.

## Support My Work

If this package saves you time, you can support ongoing development:  
👉 [Become a Patron](https://www.patreon.com/c/LaravelAddonsbyMilen)

## Other Packages

Check out my other Laravel packages:

- **[Laravel GDPR Cookie Manager](https://packagist.org/packages/milenmk/laravel-gdpr-cookie-manager)** - GDPR-compliant
  cookie consent management with user preference tracking
- **[Laravel Blacklist](https://packagist.org/packages/milenmk/laravel-blacklist)** - A Laravel package for blacklist
  validation of user input
- **[Laravel Email Change Confirmation](https://packagist.org/packages/milenmk/laravel-email-change-confirmation)** -
  Secure email change confirmation system
- **[Laravel GDPR Exporter](https://packagist.org/packages/milenmk/laravel-gdpr-exporter)** - GDPR-compliant data export
  functionality
- **[Laravel Rate Limiting](https://packagist.org/packages/milenmk/laravel-rate-limiting)** - Advanced rate limiting
  capabilities with exponential backoff
- **[Laravel Datatables and Forms](https://packagist.org/packages/milenmk/laravel-simple-datatables-and-forms)** - Easy
  to use package to create datatables and forms for Livewire components

## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

## Disclaimer

This package is provided "as is", without warranty of any kind, express or implied, including but not limited to
warranties of merchantability, fitness for a particular purpose, or noninfringement.

The author(s) make no guarantees regarding the accuracy, reliability, or completeness of the code, and shall not be held
liable for any damages or losses arising from its use.

Please ensure you thoroughly test this package in your environment before deploying it to production.
