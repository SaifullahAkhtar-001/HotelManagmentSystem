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
        
        Schema::create('rooms', function (Blueprint $table) {

        $table->id();
        $table->unsignedBigInteger('hotel_id');
        $table->unsignedBigInteger('room_type_id');
        $table->string('room_number');
        $table->string('status');
        
        $table->text('description')->nullable();
        $table->timestamps();

        $table->foreign('hotel_id')->references('id')->on('hotels');
        $table->foreign('room_type_id')->references('id')->on('room_types');
    });
}


          

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
