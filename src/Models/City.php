<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\File;

/**
 * @property int $id
 * @property string $name
 * @property int $country_id
 * @property int $city_code
 * @property string $latitude
 * @property string $longitude
 * @property bool $is_activated
 * @property string $created_at
 * @property string $updated_at
 */
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
