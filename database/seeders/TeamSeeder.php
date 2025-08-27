<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::firstOrCreate(['name' => 'Web Developers']);
        Team::firstOrCreate(['name' => 'App Developer']);
        Team::firstOrCreate(['name' => 'WordPress Developer']);
        Team::firstOrCreate(['name' => 'Designer']);
    }
}
