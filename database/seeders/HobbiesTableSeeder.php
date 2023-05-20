<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobbiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobbies')->truncate();
        $hobbies = ['cricket', 'dancing', 'cooking', 'watching TV'];

        foreach ($hobbies as $hobby) {
            DB::table('hobbies')->insert([
                'name' => $hobby,
            ]);
        }
    }
}

