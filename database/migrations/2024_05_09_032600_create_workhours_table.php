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
        Schema::create('workhours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->dateTime('week_start_date')->nullable();
            $table->enum('day', [1,2,3,4,5,6,7]);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workhours');
    }
};
