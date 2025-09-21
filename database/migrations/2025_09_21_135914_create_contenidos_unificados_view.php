<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateContenidosUnificadosView  extends Migration
{
    public function up()
    {
        DB::statement("
            CREATE VIEW contenidos AS
            SELECT id,  nombre AS titulo, descripcion, slug, tipo, 'publicacion' AS tipo_contenido FROM publicaciones
            UNION ALL
            SELECT id, nombre AS titulo, descripcion, slug, tipo, 'actividad' AS tipo_contenido FROM actividades
        ");
    }

    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS contenidos");
    }
}
