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
        Schema::table('roomtypes', function (Blueprint $table) {
            $table->dropColumn('capacity');
            $table->dropColumn('size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roomtypes', function (Blueprint $table) {
            $table->integer('capacity');
            $table->integer('size');
        });
    }
};
