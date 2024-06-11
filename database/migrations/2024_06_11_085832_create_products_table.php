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
            $table->id();
            $table->string('product_id');
            $table->string('name');
            $table->string('category');
            $table->string('sub_category')->nullable();
            $table->string('sub_sub_category')->nullable();
            $table->boolean('available')->default(false);
            $table->string('url');
            $table->integer('price');
            $table->string('picture');
            $table->string('currency_id');
            $table->integer('old_price');
            $table->string('vendor');
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
