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
        Schema::create('reservation_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('table_id')->nullable();
            $table->integer('seats');
            $table->integer('guests');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables')->onDelete('set null');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_tables');
    }
};
