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
        Schema::create('artist', function (Blueprint $table) {
            $table->id('artist_id');
            $table->string('artist_name','255');
            $table->string('genre','255');
            $table->string('country','100');
            $table->text('description');
            $table->string('photo_name','255');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artist');
    }
};
