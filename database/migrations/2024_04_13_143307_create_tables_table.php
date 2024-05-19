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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('no_meja')->unique();
            $table->string('deskripsi')->nullable();
            $table->integer('jumlah_kursi')->nullable()->default(1);
            $table->enum('status', ['disewa', 'tersedia'])->default('tersedia');
            $table->string('image')->nullable();
            $table->bool('join_allowed')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
