<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\File;

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
    ];

    protected $casts = [
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
