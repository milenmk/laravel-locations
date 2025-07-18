<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

/**
 * @property int $id
 * @property string $iso
 * @property string $name
 * @property string $arabic
 * @property string $created_at
 * @property string $updated_at
 */
class Language extends Model
{
    protected $fillable = [
        'iso',
        'name',
        'arabic',
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
        $languageJson = __DIR__ . '/../../database/data/languages.json';

        $jsonFileExists = File::exists($languageJson);
        if ($jsonFileExists) {
            return json_decode(File::get($languageJson), true);
        } else {
            return [];
        }
    }
}
