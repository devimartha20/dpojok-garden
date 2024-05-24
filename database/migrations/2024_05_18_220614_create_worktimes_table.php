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
        Schema::create('worktimes', function (Blueprint $table) {
            $table->id();
            $table->enum('day', [1,2,3,4,5,6,7]);
            $table->time('start_time');
            $table->time('end_time');
            $table->time('rest_start_time')->nullable();
            $table->time('rest_end_time')->nullable();
            $table->integer('rest_duration_min')->default(0);
            $table->integer('working_duration_min')->default(0);
            $table->integer('total_duration_min')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_settings');
    }
};
