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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('quantity');
            $table->decimal('total_price');
            $table->dateTime('purchase_date');
            $table->string('fullname');
            $table->string('phone_number');
            $table->string('email');

            $table->foreign('ticket_id')->references('ticket_id')->on('ticket')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
