<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('directorios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('puesto', [
                'Rector',
                'Rectora',
                'Secretaria Académica',
                'Secretario Académico',
                'Secretario Administrativo',
                'Secretaria Administrativa',
                'Coordinadora',
                'Coordinador',
                'Jefa',
                'Jefe',
                'Apoyo administrativo',
                'Diseñadora gráfica',
                'Diseñador gráfico',
                'Encargada de ventas y difusión',
                'Encargado de ventas y difusión',
                'Encargado de almacén e inventario',
                'Encargada de almacén e inventario'
            ]);
            $table->string('correo');
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directorios');
    }
};
