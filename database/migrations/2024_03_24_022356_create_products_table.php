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
            $table->string('nama')->unique();
            $table->string('deskripsi');
            $table->string('image')->nullable();
            $table->decimal('harga_jual');
            $table->decimal('harga_produksi')->nullable();
            $table->integer('stok')->default(1);
            $table->unsignedBigInteger('product_category_id')->nullable();
            $table->timestamps();

            $table->foreign('product_category_id')->references('id')->on('product_categories')->nullOnDelete();
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
