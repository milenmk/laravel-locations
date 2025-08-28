# Laravel Locations

<p style="display: flex; justify-content: center; gap: 8px;">
    <a href="https://packagist.org/packages/milenmk/laravel-locations" target="_blank">
        <img src="https://img.shields.io/packagist/v/milenmk/laravel-locations.svg?style=flat-square" alt="Latest Version on Packagist" />
    </a>
    <a href="https://packagist.org/packages/milenmk/laravel-locations" target="_blank">
        <img src="https://img.shields.io/packagist/dt/milenmk/laravel-locations.svg?style=flat-square" alt="Total Downloads" />
    </a>
    <a href="https://github.com/milenmk/laravel-locations" target="_blank">
        <img alt="GitHub User's stars" src="https://img.shields.io/github/stars/milenmk/laravel-locations">
    </a>
    <a href="https://laravel.com/docs" target="_blank">
        <img src="https://img.shields.io/badge/Laravel-10.x-orange?style=flat-square&logo=laravel" alt="Laravel 10 Support" />
    </a>
    <a href="https://www.php.net" target="_blank">
        <img src="https://img.shields.io/packagist/php-v/milenmk/laravel-locations?style=flat-square" alt="PHP Version Support" />
    </a>
    <a href="https://github.com/milenmk/laravel-locations/blob/develop/LICENSE.md" target="_blank">
        <img src="https://img.shields.io/packagist/l/milenmk/laravel-locations.svg?style=flat-square" alt="License" />
    </a>
    <a href="https://github.com/milenmk/laravel-locations/issues" target="_blank">
        <img src="https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat-square" alt="Contributions Welcome" />
    </a>
    <a href="https://www.patreon.com/c/LaravelAddonsbyMilen" target="_blank">
        <img src="https://img.shields.io/badge/Sponsor-%E2%9D%A4-ff69b4?style=flat-square" alt="Sponsor me" />
    </a>
</p>

This package provides a large database with Countries, Cities, Areas, Languages and Currencies models to your Laravel application

The package is ideal for applications that need:

- Country/region selection dropdowns
- Address validation and normalization
- Multi-language support for location names
- Currency conversion functionality
- Location-based features and filtering

The database contains:

- 250 Countries
- 5038 Cities (States/Regions)
- 149350 Areas (Cities part of a State/Region)

After installation, you can use the Package models to retrieve the data OR directly use the JSON files.

By default, all records are active (the field `is_activated` has a value of 1).

If you want to exclude certain records, change the field value to 0 and use the model method `getActive()`

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
