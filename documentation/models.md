```
class Country extends Model
{
    protected $fillable = [
        'name',
        'iso3',
        'iso2',
        'numeric_code',
        'phonecode',
        'currency',
        'currency_name',
        'currency_symbol',
        'tld',
        'native_name',
        'latitude',
        'longitude',
        'is_activated',
        'emoji',
        'emojiU',
        'translations',
    ];

    protected $casts = [
        'translations' => 'array',
        'is_activated' => 'boolean',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

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
        $countryJson = __DIR__ . '/../../database/data/countries.json';

        $jsonFileExists = File::exists($countryJson);
        if ($jsonFileExists) {
            return json_decode(File::get($countryJson), true);
        } else {
            return [];
        }
    }
}
```

```
class City extends Model
{
    protected $fillable = [
        'name',
        'country_id',
        'city_code',
        'latitude',
        'longitude',
        'is_activated',
    ];

    protected $casts = [
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
        $cityJson = __DIR__ . '/../../database/data/cities.json';

        $jsonFileExists = File::exists($cityJson);
        if ($jsonFileExists) {
            return json_decode(File::get($cityJson), true);
        } else {
            return [];
        }
    }
}
```

```
class Area extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'country_id',
        'latitude',
        'longitude',
        'is_activated',
    ];

    protected $casts = [
        'is_activated' => 'boolean',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function country(): BelongsTo
    {
        $this->belongsTo(Country::class);
    }

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
        $areaJson = __DIR__ . '/../../database/data/areas.json';

        $jsonFileExists = File::exists($areaJson);
        if ($jsonFileExists) {
            return json_decode(File::get($areaJson), true);
        } else {
            return [];
        }
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
