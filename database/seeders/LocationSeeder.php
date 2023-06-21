<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Database\Factories\CityFactory;
use Database\Factories\CountryFactory;
use Database\Factories\StateFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = Http::acceptJson()
            ->get('https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/countries.json')
            ->json();

        foreach ($countries as $country) {
            if (in_array($country['iso2'], Country::$validCountries)) {
                CountryFactory::new()->create([
                    'name' => $country['name'],
                    'capital' => $country['capital'] === 'Kiev' ? 'Kyiv' : $country['capital'],
                    'iso2' => $country['iso2'],
                    'iso3' => $country['iso3'],
                    'phone_code' => $country['phone_code'],
                    'currency' => $country['currency'],
                    'tld' => $country['tld'],
                    'region' => $country['region'],
                    'subregion' => $country['subregion'],
                    'is_active' => true,
                ]);
            }
        }

        $states = Http::acceptJson()
            ->get('https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/states.json')
            ->json();

        foreach ($states as $state) {
            if (in_array($state['country_code'], Country::$validCountries)) {
                StateFactory::new()->create([
                    'name' => $state['name'],
                    'country_id' => Country::whereIso2($state['country_code'])->value('id'),
                    'type' => $state['type'],
                ]);

                if ($state['country_code'] === Country::DEFAULT_COUNTRY) {
                    $stateCode = $state['state_code'];
                    $cities = Http::acceptJson()->withHeaders([
                        'X-CSCAPI-KEY' => config('services.csc.key'),
                    ])->get(config('services.csc.url') . Country::DEFAULT_COUNTRY . "/states/$stateCode/cities")->json();

                    foreach ($cities as $city) {
                        CityFactory::new()->create([
                            'name' => $city['name'],
                            'state_id' => State::whereName($state['name'])->value('id'),
                        ]);
                    }
                }
            }
        }
    }
}
