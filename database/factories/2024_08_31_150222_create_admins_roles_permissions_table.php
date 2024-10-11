<?php

//Command: php artisan make:migration create_admins_roles_permissions_table

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

         // Create table for associating roles to admins and teams (Many To Many Polymorphic)
        Schema::create('admins_roles', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->unsignedInteger('admin_id');
            $table->unsignedBigInteger('role_id');
            //$table->string('user_type')->nullable()->default('0');

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            //$table->primary(['admin_id','role_id', 'user_type']);
            $table->primary(['admin_id','role_id']);
            $table->timestamps();
        });

         // Create table for associating permissions to admins (Many To Many Polymorphic)

         Schema::create('admins_permissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('admin_id');
            $table->unsignedBigInteger('permission_id');
            //$table->string('user_type')->nullable()->default('0');

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            //$table->primary(['admin_id','permission_id','user_type']);
            $table->primary(['admin_id','permission_id']);
            $table->timestamps();
           
        });

        // Create table for associating permissions to roles (Many-to-Many)
          Schema::create('role_permissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            $table->primary(['role_id','permission_id']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins_permissions');
        Schema::dropIfExists('role_permissions');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('admins_roles');
        Schema::dropIfExists('roles');
    }
};
