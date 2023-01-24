<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => "Horror"
        ]);

        DB::table('categories')->insert([
            'name' => "Adventure"
        ]);

        DB::table('categories')->insert([
            'name' => "Casual"
        ]);

        DB::table('categories')->insert([
            'name' => "RPG"
        ]);
    }
}
