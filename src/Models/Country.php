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
 * @property string $code
 * @property string $phone
 * @property string $lat
 * @property string $lng
 * @property string $numeric_code
 * @property array $translations
 * @property array $timezones
 * @property bool $is_activated
 * @property string $created_at
 * @property string $updated_at
 * @property string $flag
 * @property string $emojiU
 * @property string $emoji
 * @property string $wikiDataId
 * @property string $currency_symbol
 * @property string $currency_name
 * @property string $currency
 * @property string $region
 * @property string $native
 * @property string $tld
 * @property string $capital
 * @property string $nationality
 * @property string $iso3
 */
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
