<?php

namespace Database\Seeders;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Hash;
Use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('admins')->truncate();

        //generate 2 admins
        $faker = Factory::create();

        DB::table('admins')->insert([
            [
                'first_name'   => "Ombeni",
                'last_name'    => "Sanga",
                'slug'         => "ombeni-sanga",
                'position'    => "System Admin",
                'phone_number' => $faker->phoneNumber,
                'email'        => "ombeni.sanga@test.com",
                'password'     => Hash::make('secret'),
                'bio'          => $faker->text(rand(250, 300)),
                'department_id'=> rand(3,3),
                'created_at'   => Carbon::now(),
            ],
            [
                'first_name'   => "Abdallah",
                'last_name'    => "Issa",
                'slug'         => "abdallah-issa",
                'position'    => "Procurement Officer",
                'phone_number' => $faker->phoneNumber,
                'email'        => "abdallah.issa@test.com",
                'password'     => Hash::make('secret'),
                'bio'          => $faker->text(rand(250, 300)),
                 'department_id'=> rand(9,9),
                'created_at'   => Carbon::now(),
            ],

            [
                'first_name'   => "John",
                'last_name'    => "Lelo",
                'slug'         => "john-lelo",
                'position'    => "Assistant Lecturer",
                'phone_number' => $faker->phoneNumber,
                'email'        => "john.lelo@test.com",
                'password'     => Hash::make('secret'),
                'bio'          => $faker->text(rand(250, 300)),
                 'department_id'=> rand(1,1),
                'created_at'   => Carbon::now(),
            ],
    
    
        ]);
    }
}
