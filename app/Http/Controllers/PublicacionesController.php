<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Publicaciones;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function show($name)
    {
        if (strcmp('todas', $name) != 0) {
            $categoria = Categoria::where('name', $name)->first();
            $categoria->name = "Publicaciones de la categoria - " . $categoria->name;
            $publicaciones_items = Publicaciones::whereBelongsTo($categoria)->where('active', true)->paginate(10);
        } else {
            $categoria = new Categoria();
            $categoria->name = 'Todas las publicaciones';
            $publicaciones_items = Publicaciones::where('active', true)->where('tipo', 'publicación')->paginate(10);
        }
        return view('publicaciones.index', compact('publicaciones_items', 'categoria'));
    }
    public function ver_publicacion($slug)
    {
        $publicacion = Publicaciones::where('slug', $slug)->first();
        return view('publicaciones.show', compact('publicacion'));
    }
    public function colecciones($name)
    {
        if (strcmp('todas', $name) != 0) {
            $categoria = Categoria::where('name', $name)->first();
            $categoria->name = "Colección - " . $categoria->name;
            $publicaciones_items = Publicaciones::whereBelongsTo($categoria)->where('active', true)->paginate(10);
            return view('publicaciones.index', compact('publicaciones_items', 'categoria'));
        }
        $categoria = new Categoria();
        $categoria->name = 'Todas las colecciones';
        $publicaciones_items = Publicaciones::where('active', true)->where('tipo', 'colección')->paginate(10);

        return view('publicaciones.index', compact('publicaciones_items', 'categoria'));
    }
}
