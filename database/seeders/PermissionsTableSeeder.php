<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\Role;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        // crud post
        $crudProduct = new Permission();
        $crudProduct->name = "crud-product";
        $crudProduct->slug = "crud-product";
        $crudProduct->save();
        

        // crud category
        $crudCategory = new Permission();
        $crudCategory->name = "crud-productcategory";
        $crudCategory->slug = "crud-productcategory";
        $crudCategory->save();


        // crud Admin
        $crudAdmin = new Permission();
        $crudAdmin->name = "crud-admin";
        $crudAdmin->slug = "crud-admin";
        $crudAdmin->save();

        // crud Admin
        $crudRole = new Permission();
        $crudRole->name = "crud-role";
        $crudRole->slug = "crud-role";
        $crudRole->save();
        

         // crud user
         $crudUser = new Permission();
         $crudUser->name = "crud-user";
         $crudUser->slug = "crud-user";
         $crudUser->save();
         

        // crud department
        $crudDepartment = new Permission();
        $crudDepartment->name = "crud-department";
        $crudDepartment->slug = "crud-department";
        $crudDepartment->save();
        

        // crud order
        $crudOrder = new Permission();
        $crudOrder->name = "crud-order";
        $crudOrder->slug = "crud-order";
        $crudOrder->save();
        

        // attach roles permissions
        $admin = Role::whereName('admin')->first();
        $pmu = Role::whereName('pmu')->first();
        $hod = Role::whereName('hod')->first();

    


       $admin->removePermissions([$crudProduct, $crudCategory, $crudAdmin,  $crudUser,  $crudDepartment,  $crudOrder,  $crudRole]);
       $admin->givePermissions([$crudProduct, $crudCategory, $crudAdmin,  $crudUser,  $crudDepartment,  $crudOrder,  $crudRole]);


        $pmu->removePermissions([$crudProduct, $crudCategory, $crudOrder]);
        $pmu->givePermissions([$crudProduct, $crudCategory, $crudOrder]);


         $hod->removePermission($crudOrder);
         $hod->givePermission($crudOrder);
   
       
    }
}
