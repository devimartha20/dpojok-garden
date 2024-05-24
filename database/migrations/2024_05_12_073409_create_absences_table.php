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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('reason', ['izin', 'sakit', 'libur']);
            $table->enum('status', ['pending','confirmed', 'rejected'])->default('pending');
            $table->timestamps();
            $table->string('keterangan')->nullable();
            $table->string('catatan')->nullable();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
