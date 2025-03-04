<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;

/**
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property int $country_id
 * @property string $latitude
 * @property string $longitude
 * @property bool $is_activated
 * @property string $created_at
 * @property string $updated_at
 */
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
