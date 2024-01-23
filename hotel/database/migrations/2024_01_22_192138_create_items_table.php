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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->integer('quantity');
            $table->string('unit_of_measurement');
            $table->integer('cost_per_unit');
            $table->integer('min_stock_level');
            $table->string('location');
            $table->date('date_of_purchase');
            $table->date('expiry_date');
            $table->string('notes');
            $table->string('status');
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
