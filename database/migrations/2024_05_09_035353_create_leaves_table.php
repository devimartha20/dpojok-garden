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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('reason');
            $table->enum('status', ['menunggu','disetujui', 'ditolak'])->default('menunggu');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
