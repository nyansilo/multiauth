<?php

// Command:php artisan make:seeder ProductsTableSeeder

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //reset the Products table
       DB::table('products')->truncate();

       //generate 10 dummy Products data
      
       $Products = [];
       $faker = Factory::create();
       $date  = Carbon::create(2024, 8, 8, 8);

       for($i=1; $i <= 30; $i++){

        $image = "Post_Image_".rand(1,5).".png";
        $date ->addDays(1);
        $publishedDate = clone($date); 
        $createdDate = clone($date);

           $products[] = [
               'author_id'   => rand(2,2),
               'name'        => $faker->sentence(rand(4,8)),
               'description'        => $faker->paragraphs(rand(10,15),true),
               'slug'        => $faker->slug(),
               'image'       => rand(0,1)==1 ? $image:NULL,
               'quantity'    => rand(5,10),
               'unit_id'     => rand(1,3),
               'created_at'  => $createdDate,
               'updated_at'  => $createdDate,
               //'deleted_at'   => $createdDate,
               'published_at'=> $i<5 ? $publishedDate : (rand(0,1)==0 ? NULL : $publishedDate->addDays(4)),
               'view_count'  => rand(1,10)*10
               
           ];
       }
       DB::table('products')->insert($products);
    }
}
