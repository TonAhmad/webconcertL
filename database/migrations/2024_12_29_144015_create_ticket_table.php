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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->string('admin_id');
            $table->unsignedBigInteger('concert_id');
            $table->string('category');
            $table->integer('price');
            $table->integer('stock');

            $table->foreign('admin_id')->references('admin_id')->on('admin')->onDelete('cascade');
            $table->foreign('concert_id')->references('concert_id')->on('concert')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
