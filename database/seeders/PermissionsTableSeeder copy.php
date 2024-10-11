<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\Role;


class PermissionsTableSeeder2 extends Seeder
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
        $crudProduct->id;

      
        

        // update others post
        // $updateOthersPost = new Permission();
        // $updateOthersPost->name = "update-others-post";
        // $updateOthersPost->slug = "update-others-post";
        // $updateOthersPost->save();
        // $updateOthersPost->id;

        // delete others post
        // $deleteOthersPost = new Permission();
        // $deleteOthersPost->name = "delete-others-post";
        // $deleteOthersPost->slug = "delete-others-post";
        // $deleteOthersPost->save();
        // $deleteOthersPost->id;

        // crud category
        $crudCategory = new Permission();
        $crudCategory->name = "crud-productcategory";
        $crudCategory->slug = "crud-productcategory";
        $crudCategory->save();
        $crudCategory->id;

        // crud Admin
        $crudAdmin = new Permission();
        $crudAdmin->name = "crud-admin";
        $crudAdmin->slug = "crud-admin";
        $crudAdmin->save();
        $crudAdmin->id;

         // crud user
         $crudUser = new Permission();
         $crudUser->name = "crud-user";
         $crudUser->slug = "crud-user";
         $crudUser->save();
         $crudUser->id;

        // crud department
        $crudDepartment = new Permission();
        $crudDepartment->name = "crud-department";
        $crudDepartment->slug = "crud-department";
        $crudDepartment->save();
        $crudDepartment->id;

        // crud order
        $crudOrder = new Permission();
        $crudOrder->name = "crud-order";
        $crudOrder->slug = "crud-order";
        $crudOrder->save();
        $crudOrder->id;

        // attach roles permissions
        $admin = Role::whereName('admin')->first();
        $pmu = Role::whereName('pmu')->first();
        $hod = Role::whereName('hod')->first();


        $admin->permissions()->detach([$crudProduct->id, $crudCategory->id, $crudAdmin->id,  $crudUser->id,  $crudDepartment->id,  $crudOrder->id]);
        $admin->permissions()->attach([$crudProduct->id, $crudCategory->id, $crudAdmin->id,  $crudUser->id,  $crudDepartment->id,  $crudOrder->id]);

        //$admin->permissions()->detach([$crudProduct, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);
        //$admin->permissions()->attach([$crudProduct, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);

        $pmu->permissions()->detach([$crudProduct->id, $crudCategory->id, $crudOrder->id]);
        $pmu->permissions()->attach([$crudProduct->id, $crudCategory->id, $crudOrder->id]);

        //$editor->permissions()->detach([$crudProduct, $updateOthersPost, $deleteOthersPost, $crudCategory]);
        //$editor->permissions()->attach([$crudProduct, $updateOthersPost, $deleteOthersPost, $crudCategory]);

         $hod->permissions()->detach($crudOrder->id);
         $hod->permissions()->attach($crudOrder->id);
   
        //$author->permissions()->detach($crudProduct);
        //$author->permissions()->attach($crudProduct);
    }
}
