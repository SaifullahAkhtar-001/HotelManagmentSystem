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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->text('about')->nullable();
            $table->text('address');
            $table->integer('zip_code')->nullable();
            $table->json('interior')->nullable();
            $table->json('amenities')->nullable();
            $table->string('city')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();

            $table->foreignID('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
