<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Admin;

class RolesTableSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        // Create Admin role
        $admin = new Role();
        $admin->name = "admin";
        $admin->slug = "admin";
        $admin->display_name = "Admin";
        $admin->save();

        // Create Editor role
        $pmu = new Role();
        $pmu->name = "pmu";
        $pmu->slug = "pmu";
        $pmu->display_name = "PMU";
        $pmu->save();

        // Create Author role
        $hod = new Role();
        $hod->name = "hod";
        $hod->slug = "hod";
        $hod->display_name = "HOD";
        $hod->save();

        // Attach the rolesf
        // first user as admin
        $user1 = Admin::find(1);
        $user1->detach($admin);
        $user1->roles()->attach($admin);

        // second user as editor
        $user2 = Admin::find(2);
        $user2->roles()->detach($pmu);
        $user2->roles()->attach($pmu);

        // third user as author
        $user3 = Admin::find(3);
        $user3->roles()->detach($hod);
        $user3->roles()->attach($hod);
    }
}
