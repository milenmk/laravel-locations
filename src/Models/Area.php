<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Milenmk\LaravelLocations\Traits\HasJsonRows;
use Milenmk\LaravelLocations\Traits\HasTranslationsAndActivation;

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
    use HasJsonRows;
    use HasTranslationsAndActivation;

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
        return $this->belongsTo(Country::class);
    }

    /**
     * Retrieve all model active records from the database
     *
     * @deprecated Since v1.4.0. Use `scopeActivated()` or `Area::activated()` instead.
     *             This method will be removed in a future major release (v2.0.0).
     */
    public function getActive()
    {
        return self::where('is_activated', 1);
    }
}
