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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('no_payment')->unique();
            $table->enum('status', ['lunas', 'belum_lunas'])->default('belum_lunas');
            $table->bigInteger('uang')->nullable();
            $table->bigInteger('kembali')->nullable();
            $table->bigInteger('total_bayar');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
