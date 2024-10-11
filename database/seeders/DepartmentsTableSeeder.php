<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
//use App\Models\Product;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('departments')->truncate();

         DB::table('departments')->insert([

            [
                'name' => 'ICT and Mathematics',
                'slug' => 'ict-and-mathematics'
            ],
          
            [
                'name' => 'Procurement and Supply Management',
                'slug'  => 'procurement-and-Supply-Management'
            ],

            [
                'name' => 'ICT Directory',
                'slug' => 'ict-irectory'
            ],

            [
                'name' => 'Academic Research and Consultancy',
                'slug'  => 'academic-research-and-consultancy'
            ],
            [
                'name' => 'Human Resource Management',
                'slug'  => 'human-resource-management'
            ],

            [
                'name' => 'Library',
                'slug'  => 'library'
            ],

            [
                'name' => 'Planning Finance and Administration',
                'slug'  => 'planning-finance-and-administration'
            ],

            [
                'name' => 'Campus Director',
                'slug'  => 'campus-director'
            ],

            [
                'name' => 'Procurement Management Unit',
                'slug'  => 'procurement-management-unit'
            ],
            [
                'name' => 'Planning and Development',
                'slug'  => 'planning-and-development'
            ],
            [
                'name' => 'Admission and Examination',
                'slug'  => 'admission-and-examination',
            ],
            [
                'name' => 'Dean of Student',
                'slug'  => 'dean-of-Student'
            ],
            [
                'name' => 'Business Administration and Marketing',
                'slug'  => 'business-administration-and-marketing'
            ],
            [
                'name' => 'Finance',
                'slug'  => 'finance',
            ],

            [
                'name' => 'Accountancy',
                'slug'  => 'accountancy',
            ],
           
        ]);

        //$products = Product::all()->pluck('id');


         //Updates the  product data

        //for ($product_id = 1; $product_id <= count($products)-1; $product_id++)
    //    for ($user_id = 1; $user_id <= 3; $user_id++)    
    //    {
    //        $department_id = rand(1, 2);

    //        DB::table('users')
    //            ->where('id', $user_id)
    //            ->update(['department_id' => $department_id]);

    //         DB::table('admins')
    //         ->where('id', $user_id)
    //         ->update(['department_id' => $department_id]);
    //     }
    }
}
