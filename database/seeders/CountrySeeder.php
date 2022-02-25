<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\ShippingCost;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ["name" => "Algeria", "code" => "DZ", 'states' => []],
            ["name" => "Cameroon", "code" => "CM", 'states' => []],
            ["name" => "Ghana", "code" => "GH", 'states' => []],
            ["name" => "Kenya", "code" => "KE", 'states' => []],
            ["name" => "Niger", "code" => "NE", 'states' => []],
            [
                "name" => "Nigeria",
                "code" => "NG",
                "states" => [
                    "Abia", "Adamawa", "Akwa Ibom", "Anambra",
                    "Bauchi", "Bayelsa", "Benue", "Borno",
                    "Cross River", "Delta", "Ebonyi", "Edo",
                    "Ekiti", "Enugu", "FCT - Abuja", "Gombe",
                    "Imo", "Jigawa", "Kaduna", "Kano",
                    "Katsina", "Kebbi", "Kogi", "Kwara",
                    "Lagos", "Nasarawa", "Niger", "Ogun",
                    "Ondo", "Osun", "Oyo", "Plateau",
                    "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara"
                ]
            ],
            ["name" => "Togo", "code" => "TG", 'states' => []],
        ];

        foreach ($countries as $c) {
            $country = Country::create([
                'name' => $c['name'],
                'code' => $c['code']
            ]);

            foreach ($c['states'] as $key => $state ) {
                $state  = $country->states()->create(['name' => $state]);

                $cost1 = ShippingCost::inRandomOrder()->first();
                $cost2 = ShippingCost::inRandomOrder()->first();
                
                $state->shipping_costs()->attach([
                    $cost1->id =>  ['type' => 'pickup'],
                    $cost2->id =>  ['type' => 'delivery'],
                ]);
            }
        }
    }
}
