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
        Schema::create('ticket_log', function (Blueprint $table) {
            $table->id('ticket_log');
            $table->unsignedBigInteger('ticket_id');
            $table->string('admin_id');
            $table->enum('action',['CREATE','DELETE','UPDATE']);
            $table->text('description');
            $table->dateTime('timestamp');

            $table->foreign('ticket_id')->references('ticket_id')->on('ticket')->onDelete('cascade');
            $table->foreign('admin_id')->references('admin_id')->on('admin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_log');
    }
};
