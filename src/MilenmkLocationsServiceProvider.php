<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations;

use Illuminate\Support\ServiceProvider;
use Milenmk\LaravelLocations\Console\MilenmkLocationsInstallCommand;
use Milenmk\LaravelLocations\Console\MilenmkLocationsSeedCommand;
use Milenmk\LaravelLocations\Console\MilenmkLocationsUpdateCountryTranslationsCommand;

class MilenmkLocationsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register generate command
        $this->commands([
            MilenmkLocationsInstallCommand::class,
            MilenmkLocationsSeedCommand::class,
            MilenmkLocationsUpdateCountryTranslationsCommand::class,
        ]);

        // Register Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

    }

    public function boot(): void
    {
        // you boot methods here
    }
}
