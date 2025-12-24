<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasTranslationsAndActivation
{
    /**
     * Scope to filter only activated records.
     */
    public function scopeActivated(Builder $query): Builder
    {
        return $query->where('is_activated', true);
    }

    /**
     * Scope to filter countries by name in a given locale.
     * Only applies if the model has a `translations` field (like Country).
     */
    public function scopeByName(Builder $query, string $term, string $locale = 'EN'): Builder
    {
        if (! isset($this->translations)) {
            // fallback: filter by `name` field if exists
            return $query->where('name', 'LIKE', "%{$term}%");
        }

        $locale = strtoupper($locale);

        return $query->whereJsonContains("translations->$locale", $term);
    }

    /**
     * Get the name of the model in the given locale.
     * Only applies if translations exist, otherwise returns the `name` property.
     */
    public function getName(string $locale = 'EN'): ?string
    {
        $locale = strtoupper($locale);

        if (isset($this->translations) && is_array($this->translations)) {
            return $this->translations[$locale] ?? $this->translations['EN'] ?? null;
        }

        return $this->name ?? null;
    }
}
