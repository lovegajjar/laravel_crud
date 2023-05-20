<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            // Andhra Pradesh
            ['name' => 'Visakhapatnam', 'state_id' => 1],
            ['name' => 'Vijayawada', 'state_id' => 1],
            // Arunachal Pradesh
            ['name' => 'Itanagar', 'state_id' => 2],
            ['name' => 'Naharlagun', 'state_id' => 2],
            // Assam
            ['name' => 'Guwahati', 'state_id' => 3],
            ['name' => 'Dibrugarh', 'state_id' => 3],
            // Bihar
            ['name' => 'Patna', 'state_id' => 4],
            ['name' => 'Gaya', 'state_id' => 4],
            // Chhattisgarh
            ['name' => 'Raipur', 'state_id' => 5],
            ['name' => 'Bilaspur', 'state_id' => 5],
            // Goa
            ['name' => 'Panaji', 'state_id' => 6],
            ['name' => 'Margao', 'state_id' => 6],
            // Gujarat
            ['name' => 'Ahmedabad', 'state_id' => 7],
            ['name' => 'Surat', 'state_id' => 7],
            // Haryana
            ['name' => 'Gurgaon', 'state_id' => 8],
            ['name' => 'Faridabad', 'state_id' => 8],
            // Himachal Pradesh
            ['name' => 'Shimla', 'state_id' => 9],
            ['name' => 'Mandi', 'state_id' => 9],
            // Jharkhand
            ['name' => 'Ranchi', 'state_id' => 10],
            ['name' => 'Jamshedpur', 'state_id' => 10],
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert($city);
        }
    }
}

