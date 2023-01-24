<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specs')->insert([
            'name' => 'Light',
            'os' => 'Windows 7',
            'processor' => '2.4 GHz or faster processor',
            'memory' => '2 GB RAM',
            'graphics' => '512 MB display memory'
        ]);

        DB::table('specs')->insert([
            'name' => 'Medium',
            'os' => 'Windows 7 64-bit',
            'processor' => 'Intel(R) Core(TM) i5-7200U CPU @ 2.50Ghz',
            'memory' => '4 GB RAM',
            'graphics' => 'NVIDIA GeForce 940MX'
        ]);

        DB::table('specs')->insert([
            'name' => 'Heavy',
            'os' => 'Windows 8',
            'processor' => 'Intel i5 3570K / AMD FX-8350',
            'memory' => '4 GB RAM',
            'graphics' => 'GTX 770 with 2GB VRAM / Radeon R9 280X 3GB'
        ]);
    }
}
