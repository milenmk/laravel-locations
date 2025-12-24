<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Milenmk\LaravelLocations\Traits\HasJsonRows;
use Milenmk\LaravelLocations\Traits\HasTranslationsAndActivation;

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
    use HasJsonRows;
    use HasTranslationsAndActivation;

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
     *
     * @deprecated Since v1.4.0. Use `scopeActivated()` or `City::activated()` instead.
     *             This method will be removed in a future major release (v2.0.0).
     */
    public function getActive()
    {
        return self::where('is_activated', 1);
    }

    // Proximity query
    public function scopeNear($query, float $lat, float $lng, float $radius = 50)
    {
        if (! $this->latitude || ! $this->longitude) {
            return $query;
        }

        $haversine = "(6371 * acos(cos(radians($lat))
                        * cos(radians(latitude))
                        * cos(radians(longitude) - radians($lng))
                        + sin(radians($lat))
                        * sin(radians(latitude))))";

        return $query->selectRaw("*, $haversine AS distance")
            ->having('distance', '<=', $radius)
            ->orderBy('distance');
    }
}
