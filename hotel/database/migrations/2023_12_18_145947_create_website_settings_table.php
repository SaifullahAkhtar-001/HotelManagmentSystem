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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('show_booking_filter')->nullable();
            $table->boolean('show_interior')->nullable();
            $table->boolean('show_amenities')->nullable();
            $table->boolean('show_room')->nullable();
            $table->integer('booking_filter_layout')->nullable();
            $table->string('button_color')->nullable();
            $table->integer('nav_layout')->nullable();
            $table->timestamps();

            $table->foreignID('hotel_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
