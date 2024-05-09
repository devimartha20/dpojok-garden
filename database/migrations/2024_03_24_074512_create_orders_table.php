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
            $table->id();
            $table->string('no_pesanan')->unique();
            $table->enum('tipe', ['in_store', 'online'])->default('in_store');
            $table->enum('packing', ['dine_in', 'take_away'])->default('dine_in');
            $table->enum('progress', ['menunggu_pembayaran', 'menunggu', 'diproses', 'selesai', 'diterima', 'dibatalkan'])->default('menunggu_pembayaran');
            $table->enum('status', ['lunas', 'belum_lunas', 'expired'])->default('belum_lunas');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('pemesan')->nullable();
            $table->bigInteger('total_harga')->default(0);
            $table->integer('jumlah_pesanan')->default(0);
            $table->string('snap_token')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('set null');
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
