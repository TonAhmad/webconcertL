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
        Schema::create('transaction_log', function (Blueprint $table) {
            $table->id('transaction_log');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ticket_id');
            $table->enum('action',['BUY','REFUND']);
            $table->integer('quantity');
            $table->dateTime('timestamp');

            $table->foreign('transaction_id')->references('transaction_id')->on('transaction')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->foreign('ticket_id')->references('ticket_id')->on('ticket')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_log');
    }
};
