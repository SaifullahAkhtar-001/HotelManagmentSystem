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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained();
            $table->foreignId('guest_id')->constrained();
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('adults');
            $table->integer('children');
            $table->integer('nights');
            $table->string('status');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('payment_payload');
            $table->boolean('payment_response');
            $table->string('payment_amount');
            $table->string('payment_currency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
