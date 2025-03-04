## About

This package provides large database with Countries, Cities, Areas, Languages and Currencies models to your Laravel application

The database contains:

- 250 Countries
- 5038 Cities (States/Regions)
- 149350 Areas (Cities part of a State/Region)

After installation, you can use the Package models to retrieve the data OR directly use the json files.

By default, all records are active (the field `is_activated` has a value of 1).

Is you want to exclude certain records, change the field value to 0 and use the model method `getActive()`

## Requirements

- PHP 8.1 or higher
- Laravel 9.x or higher

## Install

Run `composer require milenmk/laravel-locations` to install the package

Run `php artisan milenmk-locations:install` to publish the migrations and seed the database tables

When the command is run, the database tables for the models will be created and then they will be seeded with
the data included in the json files.

## Additional Information

Models included in the package:

```
class Country extends Model
{
    protected $fillable = [
        'name',
        'code',
        'phone',
        'lat',
        'lng',
        'translations',
        'timezones',
        'numeric_code',
        'is_activated',
        'flag',
        'emojiU',
        'emoji',
        'wikiDataId',
        'currency_symbol',
        'currency_name',
        'currency',
        'region',
        'native',
        'tld',
        'capital',
        'nationality',
        'iso3',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'translations' => 'json',
        'timezones' => 'json',
        'is_activated' => 'boolean',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
```

```
class City extends Model
{
    protected $fillable = [
        'name',
        'translations',
        'is_activated',
        'country_id',
        'lat',
        'lng',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'translations' => 'json',
        'is_activated' => 'boolean',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }
}
```

```
class Area extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'translations',
        'is_activated',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'translations' => 'json',
        'is_activated' => 'boolean',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
```

```
class Currency extends Model
{
    protected $fillable = [
        'translations',
        'exchange_rate',
        'symbol',
        'is_activated',
        'arabic',
        'name',
        'iso',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'translations' => 'array',
        'is_activated' => 'boolean',
    ];
}
```

```
class Language extends Model
{
    protected $fillable = [
        'iso',
        'name',
        'arabic',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'translations' => 'json',
        'is_activated' => 'boolean',
    ];
}
```

## DISCLAIMER

This package is provided ”as is”, without warranty of any kind, either express or implied, including but not limited to the warranties of merchantability, fitness for a particular
purpose, or noninfringement.

The author(s) make no representations or warranties regarding the accuracy, reliability or completeness of the code or its suitability for any specific use case. It is recommended
that you thoroughly test this package in your environment before deploying it to production.

By using this package, you acknowledge and agree that the author(s) shall not be held liable for any damages, losses or other issues arising from the use of this software.

## Contributing

You can review the source code, report bugs, or contribute to the project by visiting the GitHub repository:

[GitHub Repository](https://github.com/milenmk/laravel-livewire-crud)

Feel free to open issues or submit pull requests. Contributions are welcome!

## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
