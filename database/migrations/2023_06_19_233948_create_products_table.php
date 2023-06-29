<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191)->index();
            $table->text('description');
            $table->string('stock');
            $table->decimal('price', 10, 4);
            $table->string('price_currency', 191)->default('USD');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function ($table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('sub_category_id')->references('id')->on('subcategories')->onDelete('set null');
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