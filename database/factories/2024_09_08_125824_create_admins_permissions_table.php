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
        Schema::create('admins_permissions', function (Blueprint $table) {
            $table->unsignedInteger('admin_id');
            $table->unsignedBigInteger('permission_id');
            //$table->string('user_type')->nullable()->default('0');

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            //$table->primary(['admin_id','permission_id','user_type']);
            $table->primary(['admin_id','permission_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins_permissions');
    }
};
