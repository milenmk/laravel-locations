<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use Milenmk\LaravelLocations\Traits\HasJsonRows;
use Milenmk\LaravelLocations\Traits\HasTranslationsAndActivation;

/**
 * @property int $id
 * @property string $name
 * @property string $iso3
 * @property string $iso2
 * @property string $numeric_code
 * @property string $phonecode
 * @property string $currency
 * @property string $currency_name
 * @property string $currency_symbol
 * @property string $tld
 * @property string $native_name
 * @property string $latitude
 * @property string $longitude
 * @property bool $is_activated
 * @property string $emoji
 * @property string $emojiU
 * @property string $created_at
 * @property string $updated_at
 */
class Country extends Model
{
    use HasJsonRows;
    use HasTranslationsAndActivation;

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

    // Cached retrieval
    public static function allCached()
    {
        return Cache::remember('locations.countries', 3600, fn () => self::active()->get());
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    /**
     * Retrieve all model active records from the database
     *
     * @deprecated Since v1.4.0. Use `scopeActivated()` or `Country::activated()` instead.
     *             This method will be removed in a future major release (v2.0.0).
     */
    public function getActive()
    {
        return self::where('is_activated', 1);
    }
}
