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
        Schema::table('img_galleries', function (Blueprint $table) {
            $table->boolean('is_hero')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('img_galleries', function (Blueprint $table) {
            $table->dropColumn('is_hero');
        });
    }
};
