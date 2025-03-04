<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

/**
 * @property int $id
 * @property string $arabic
 * @property string $name
 * @property string $iso
 * @property string $created_at
 * @property string $updated_at
 */
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
