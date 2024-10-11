<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
//use App\Models\Product;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('product_categories')->truncate();

         DB::table('product_categories')->insert([

            [
                'name' => 'Uncategorized',
                'slug' => 'uncategorized'
            ],
            [
                'name' => 'Furniture',
                'slug'  => 'furniture'
            ],
            [
                'name' => 'Stationery',
                'slug'  => 'stationery'
            ],
            [
                'name' => 'Office equipment',
                'slug'  => 'office-equipment',
            ],
           
        ]);

        //$products = Product::all()->pluck('id');


         //Updates the  product data

        //for ($product_id = 1; $product_id <= count($products)-1; $product_id++)
       for ($product_id = 1; $product_id <= 30; $product_id++)    
       {
           $category_id = rand(1, 4);

           DB::table('products')
               ->where('id', $product_id)
               ->update(['category_id' => $category_id]);
        }
    }
}
