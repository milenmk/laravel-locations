<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MilenmkLocationsUpdateCountryTranslationsCommand extends Command
{
    protected $signature = 'milenmk-locations:update-countries-translations';
    protected $description = 'Update the country table with translations from the JSON file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->info('Updating countries with translations.');

        $countryJson = __DIR__ . '/../../database/data/countries.json';

        if (! file_exists($countryJson)) {
            $this->error('Country JSON file not found.');

            return;
        }

        $countries = json_decode(file_get_contents($countryJson), true);

        $progress = $this->getOutput()->createProgressBar(count($countries));
        $progress->setFormat("%message%\n %current%/%max% [%bar%] %percent:3s%%");
        $progress->setMessage('Countries');
        $progress->setEmptyBarCharacter('░'); // light shade character \u2591
        $progress->setProgressCharacter('');
        $progress->setBarCharacter('█');

        foreach ($countries as $country) {
            DB::table('countries')
                ->where('id', $country['id'])
                ->update(['translations' => json_encode($country['translations'])]);
            $progress->advance();
        }

        $progress->finish();
        $progress->clear();

        $this->info('Countries updated with translations successfully.');
    }
}
