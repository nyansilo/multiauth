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
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('author_id')->references('id')->on('admins')->onDelete('restrict');
            $table->integer('quantity');
            $table->integer('unit_id')->unsigned()->nullable();;
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('restrict');
            $table->tinyInteger('status')->default('0')->comment('1=hidden, 0=visible');
            $table->string('brand')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedInteger('category_id')->unsigned()->nullable();;
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('restrict');
            $table->string('view_count')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
