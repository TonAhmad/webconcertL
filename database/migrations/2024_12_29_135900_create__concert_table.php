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
        Schema::create('concert', function (Blueprint $table) {
            $table->id('concert_id');
            $table->unsignedBigInteger('artist_id');
            $table->string('concert_name');
            $table->date('date');
            $table->time('time');
            $table->integer('capacity');
            $table->string('location');

            $table->foreign('artist_id')->references('artist_id')->on('artist')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_concert');
    }
};
