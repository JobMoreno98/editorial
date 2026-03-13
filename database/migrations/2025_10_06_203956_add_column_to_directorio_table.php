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
        Schema::table('directorios', function (Blueprint $table) {
            $table->string("puesto");
            $table->unsignedBigInteger('id_padre')->nullable();

            $table->foreign('id_padre')->references('id')->on('directorios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('directorios', function (Blueprint $table) {
            //
        });
    }
};
