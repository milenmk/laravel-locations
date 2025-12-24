```php
- `id`, `name`, `iso3`, `iso2`, `numeric_code`, `phonecode`, `currency`, `currency_name`, `currency_symbol`, `tld`, `native_name`, `latitude`, `longitude`, `is_activated`, `emoji`, `emojiU`, `translations`,
- `activated()` scope
- `scopeByName($term, $locale = 'EN')`
- `getName($locale = 'EN')`
- `cities()` relation
- `getRows()` JSON reader
```

```php
- `id`, `name`, `country_id`, `city_code`, `latitude`, `longitude`, `is_activated`
- `activated()` scope
- `scopeByName($term, $locale = 'EN')`
- `getName($locale = 'EN')`
- `country()` relation
- `areas()` relation
- `scopeNear($lat, $lng, $radius = 50)` proximity search
- `getRows()` JSON reader
```

```php
- `id`, `name`, `city_id`, `country_id`, `latitude`, `longitude`, `is_activated`, `translations`
- `activated()` scope
- `scopeByName($term, $locale = 'EN')`
- `getName($locale = 'EN')`
- `city()` relation
- `getRows()` JSON reader
```

```php
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

    /**
     * Retrieve all model active records from the database
     */
    public function getActive()
    {
        return self::where('is_activated', 1);
    }

    /**
     * @throws FileNotFoundException
     */
    public function getRows()
    {

        $currencyJson = __DIR__ . '/../../database/data/currencies.json';

        $jsonFileExists = File::exists($currencyJson);
        if ($jsonFileExists) {
            return json_decode(File::get($currencyJson), true);
        } else {
            return [];
        }
    }
}
```

```php
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
        'translations' => 'array',
        'is_activated' => 'boolean',
    ];

    /**
     * Retrieve all model active records from the database
     */
    public function getActive()
    {
        return self::where('is_activated', 1);
    }

    /**
     * @throws FileNotFoundException
     */
    public function getRows()
    {
        $languageJson = __DIR__ . '/../../database/data/languages.json';

        $jsonFileExists = File::exists($languageJson);
        if ($jsonFileExists) {
            return json_decode(File::get($languageJson), true);
        } else {
            return [];
        }
    }
}
```
