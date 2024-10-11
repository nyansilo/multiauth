<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Hash;
Use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //reset the users table
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
         DB::table('users')->truncate();
 
         //generate 2 admins
         $faker = Factory::create();
 
         DB::table('users')->insert([
             [
                 'first_name'   => "Daniel",
                 'last_name'    => "George",
                 'slug'         => "daniel-george",
                 'position'    => "Assistant Lecturer",
                 'phone_number' => $faker->phoneNumber,
                 'email'        => "daniel.george@test.com",
                 'password'     => Hash::make('secret'),
                 'bio'          => $faker->text(rand(250, 300)),
                 'department_id'=> rand(1,1),
                 'created_at'   => Carbon::now(),
             ],
             [
                 'first_name'   => "Neema",
                 'last_name'    => "Ngowi",
                 'slug'         => "neema-ngowi",
                 'position'    => "Assistant Lecturer",
                 'phone_number' => $faker->phoneNumber,
                 'email'        => "neema.ngowi@test.com",
                 'password'     => Hash::make('secret'),
                 'bio'          => $faker->text(rand(250, 300)),
                'department_id'=> rand(2,2),
                 'created_at'   => Carbon::now(),
             ],

             [
                'first_name'   => "Ezekiel",
                'last_name'    => "Kumburu",
                'slug'         => "ezekiel-kumburu",
                'position'    => "Assistant Lecturer",
                'phone_number' => $faker->phoneNumber,
                'email'        => "ezekumburu@test.com",
                'password'     => Hash::make('secret'),
                'bio'          => $faker->text(rand(250, 300)),
                 'department_id'=> rand(3,3), 
                'created_at'   => Carbon::now(),
            ],
     
     
         ]);
    }
}
