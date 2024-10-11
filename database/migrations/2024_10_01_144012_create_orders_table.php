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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('admins')->onDelete('restrict');
            $table->integer('approver_id')->unsigned()->nullable();
            $table->foreign('approver_id')->references('id')->on('admins')->onDelete('restrict');
            $table->integer('authorizer_id')->unsigned()->nullable();
            $table->foreign('authorizer_id')->references('id')->on('admins')->onDelete('restrict');
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('restrict');
            $table->string('user_sign')->nullable();
            $table->string('approver_sign')->nullable();
            $table->string('authorizer_sign')->nullable();
            $table->string('tracking_no');
            $table->string('status_message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
