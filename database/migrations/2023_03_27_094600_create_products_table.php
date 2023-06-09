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
            $table->string('product_name');
            $table->text('description');
            $table->string('brand');
            $table->string('image');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('product_code')->nullable();
            $table->text('barcode')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->integer('alert_stock')->default('100');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
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
