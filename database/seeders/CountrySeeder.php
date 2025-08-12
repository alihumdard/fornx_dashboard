<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $countries = [
            [
                'country_name' => 'Afghanistan',
                'country_code' => 'AF',
                'iso_code' => 'AFG',
                'phone_code' => '+93',
                'currency_code' => 'AFN',
                'currency_name' => 'Afghan afghani',
                'continent' => 'Asia'
            ],
            // Add all other countries here (from the MySQL example)
            // ...
            [
                'country_name' => 'Zimbabwe',
                'country_code' => 'ZW',
                'iso_code' => 'ZWE',
                'phone_code' => '+263',
                'currency_code' => 'ZWL',
                'currency_name' => 'Zimbabwean dollar',
                'continent' => 'Africa'
            ]
        ];

        Country::insert($countries);
    }
}
