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
            $countries = json_decode(file_get_contents($countryJson), true);
            foreach ($countries as $country) {
                DB::table('countries')->insert($country);
            }
        }

        if ($cityFileExists) {
            $cities = json_decode(file_get_contents($cityJson), true);
            foreach ($cities as $city) {
                DB::table('cities')->insert($city);
            }
        }

        if ($areaFileExists) {
            $areas = json_decode(file_get_contents($areaJson), true);
            foreach ($areas as $area) {
                DB::table('areas')->insert($area);
            }
        }

        if ($currencyFileExists) {
            $currencies = json_decode(file_get_contents($currencyJson), true);
            foreach ($currencies as $currency) {
                DB::table('currencies')->insert($currency);
            }
        }

        if ($languageFileExists) {
            $languages = json_decode(file_get_contents($languageJson), true);
            foreach ($languages as $language) {
                DB::table('languages')->insert($language);
            }
        }

        $this->info('Seeding the database with locations data is completed.');
    }
}
