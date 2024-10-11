<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('units')->truncate();

         DB::table('units')->insert([

            [
                'name' => 'PC',
                'slug' => 'pc'
            ],
            [
                'name' => 'RIM',
                'slug'  => 'rim'
            ],
            [
                'name' => 'BOX',
                'slug'  => 'box'
            ],
            
           
        ]);

    }
}
