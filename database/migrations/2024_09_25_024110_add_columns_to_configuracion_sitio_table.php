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
        Schema::table('configuracion_sitios', function (Blueprint $table) {
            $table->string('accent_color');
            $table->string('heading_color');
            $table->string('nav_color');
            $table->string('nav_hover_color');
            $table->string('nav_dropdown_color');
            $table->string('nav_dropdown_hover_color');
            $table->string('background_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('configuracion_sitios', function (Blueprint $table) {
            //
        });
    }
};
