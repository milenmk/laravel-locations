<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Console;

use Illuminate\Console\Command;

class MilenmkLocationsInstallCommand extends Command
{
    protected $signature = 'milenmk-locations:install';

    protected $description = 'install package and publish assets';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->info('Publish Package Assets');
        $this->call('migrate');
        $this->info('Laravel Locations installed successfully.');
    }
}
