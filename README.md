### About

<br><br>
This package provides a large database with Countries, Cities, Areas, Languages and Currencies models to your Laravel application
<br><br>
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

## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
