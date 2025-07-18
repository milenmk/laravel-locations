<?php

declare(strict_types=1);

namespace Milenmk\LaravelLocations\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MilenmkLocationsSeedCommand extends Command
{
    protected $signature = 'milenmk-locations:seed';

    protected $description = 'seed the database with locations data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->info('Start seeding the database with locations data.');

        $countryJson = __DIR__ . '/../../database/data/countries.json';
        $cityJson = __DIR__ . '/../../database/data/cities.json';
        $areaJson = __DIR__ . '/../../database/data/areas.json';
        $currencyJson = __DIR__ . '/../../database/data/currencies.json';
        $languageJson = __DIR__ . '/../../database/data/languages.json';

        $countryFileExists = file_exists($countryJson);
        $cityFileExists = file_exists($cityJson);
        $areaFileExists = file_exists($areaJson);
        $currencyFileExists = file_exists($currencyJson);
        $languageFileExists = file_exists($languageJson);

        if ($countryFileExists) {
            $this->outputComponents()->info('Seeding the database with countries data.');

            $countries = json_decode(file_get_contents($countryJson), true);

            $progress = $this->getOutput()->createProgressBar(count($countries));
            $progress->setFormat("%message%\n %current%/%max% [%bar%] %percent:3s%%");
            $progress->setMessage('Countries');
            $progress->setEmptyBarCharacter('░'); // light shade character \u2591
            $progress->setProgressCharacter('');
            $progress->setBarCharacter('█');

            foreach ($countries as $country) {
                // Ensure the 'translations' field is JSON encoded
                if (isset($country['translations'])) {
                    $country['translations'] = json_encode($country['translations']);
                }
                DB::table('countries')->insert($country);
                $progress->advance();
            }

            $progress->finish();
            $progress->clear();
        }

        if ($cityFileExists) {
            $this->outputComponents()->info('Seeding the database with cities data.');

            $cities = json_decode(file_get_contents($cityJson), true);

            $progress = $this->getOutput()->createProgressBar(count($cities));
            $progress->setFormat("%message%\n %current%/%max% [%bar%] %percent:3s%%");
            $progress->setMessage('Cities');
            $progress->setEmptyBarCharacter('░'); // light shade character \u2591
            $progress->setProgressCharacter('');
            $progress->setBarCharacter('█');

            foreach ($cities as $city) {
                DB::table('cities')->insert($city);

                $progress->advance();
            }

            $progress->finish();
            $progress->clear();
        }

        if ($areaFileExists) {
            $this->outputComponents()->info('Seeding the database with areas data.');
            $this->outputComponents()->warn('This WILL take a while :( Time for a coffee :)');

            $areas = json_decode(file_get_contents($areaJson), true);

            $progress = $this->getOutput()->createProgressBar(count($areas));
            $progress->setFormat("%message%\n %current%/%max% [%bar%] %percent:3s%%");
            $progress->setMessage('Areas');
            $progress->setEmptyBarCharacter('░'); // light shade character \u2591
            $progress->setProgressCharacter('');
            $progress->setBarCharacter('█');

            foreach ($areas as $area) {
                DB::table('areas')->insert($area);

                $progress->advance();
            }

            $progress->finish();
            $progress->clear();
        }

        if ($currencyFileExists) {
            $this->outputComponents()->info('Seeding the database with currencies data.');

            $currencies = json_decode(file_get_contents($currencyJson), true);

            $progress = $this->getOutput()->createProgressBar(count($currencies));
            $progress->setFormat("%message%\n %current%/%max% [%bar%] %percent:3s%%");
            $progress->setMessage('Currencies');
            $progress->setEmptyBarCharacter('░'); // light shade character \u2591
            $progress->setProgressCharacter('');
            $progress->setBarCharacter('█');

            foreach ($currencies as $currency) {
                DB::table('currencies')->insert($currency);

                $progress->advance();
            }

            $progress->finish();
            $progress->clear();
        }

        if ($languageFileExists) {
            $this->outputComponents()->info('Seeding the database with languages data.');

            $languages = json_decode(file_get_contents($languageJson), true);

            $progress = $this->getOutput()->createProgressBar(count($languages));
            $progress->setFormat("%message%\n %current%/%max% [%bar%] %percent:3s%%");
            $progress->setMessage('Languages');
            $progress->setEmptyBarCharacter('░'); // light shade character \u2591
            $progress->setProgressCharacter('');
            $progress->setBarCharacter('█');

            foreach ($languages as $language) {
                DB::table('languages')->insert($language);

                $progress->advance();
            }

            $progress->finish();
            $progress->clear();
        }

        $this->info('Seeding the database with locations data is completed.');
    }
}
