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
            $table->boolean('show_booking_filter')->default(1)->nullable();
            $table->boolean('show_interior')->default(1)->nullable();
            $table->boolean('show_amenities')->default(1)->nullable();
            $table->boolean('show_room')->default(1)->nullable();
            $table->integer('booking_filter_layout')->default(1)->nullable();
            $table->string('button_color')->default('#2B35AF')->nullable();
            $table->string('hr_color')->default('#6b7280')->nullable();
            $table->integer('nav_layout')->default(1)->nullable();
            $table->string('hero_section_image_url')->default('images/hotel.jpg')->nullable();
            $table->string('interior_display_format')->default('carousal')->nullable();
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
