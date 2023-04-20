<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $json = file_get_contents(storage_path('app/ville.json'));
        $data = json_decode($json, true);
        foreach ($data as $city){
            City::create(['name'=>$city['ville']]);
        }
    }
}
