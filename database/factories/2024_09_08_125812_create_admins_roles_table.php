<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins_roles', function (Blueprint $table) {
            $table->unsignedInteger('admin_id');
            $table->unsignedBigInteger('role_id');
            //$table->string('user_type')->nullable()->default('0');

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            //$table->primary(['admin_id','role_id', 'user_type']);
            $table->primary(['admin_id','role_id']);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins_roles');
    }
};
