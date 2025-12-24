<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

trait HasJsonRows
{
    /**
     * Retrieve data from the JSON file corresponding to the model.
     *
     * This method reads the JSON file located in the `database/data` folder.
     * The result is cached for 1 hour to avoid repeated file reads.
     *
     * Usage example: $countries = (new Country)->getRows();
     *
     * @return array The decoded JSON data as an associative array. Returns an empty array if
     *               the file does not exist or cannot be read.
     */
    public function getRows(): array
    {
        $model = class_basename($this); // Country, City, Area
        $cacheKey = "locations.{$model}.json";

        return Cache::remember($cacheKey, 3600, function () use ($model) {
            $path = config(
                'locations.json_path.' . strtolower($model),
                __DIR__ . '/../../database/data/' . strtolower($model) . 's.json'
            );

            if (! File::exists($path)) {
                return [];
            }

            return json_decode(File::get($path), true);
        });
    }
}
