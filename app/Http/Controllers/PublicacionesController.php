<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Publicaciones;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PublicacionesController extends Controller
{
    public function show($name, $anio = null)
    {
        if (strcmp('todas', $name) != 0) {
            $categoria = Categoria::where('name', $name)->first();
            $categoria->name = 'Publicaciones de la categoria - ' . $categoria->name;

            $anios = Publicaciones::select(DB::raw('count(anio_publicacion) as total'), 'active', 'tipo', 'anio_publicacion')->whereBelongsTo($categoria)->where('active', true)->groupBy('anio_publicacion')->get()->pluck('total', 'anio_publicacion');

            $url = route('publicaciones.show', $categoria->name);
            $publicaciones_items = Publicaciones::whereBelongsTo($categoria)->where('active', true)->paginate(10);
        } else {
            $categoria = new Categoria();
            $categoria->name = 'Todas las publicaciones';

            $anios = Publicaciones::select(DB::raw('count(anio_publicacion) as total'), 'active', 'tipo', 'anio_publicacion')->where('active', true)->where('tipo', 'publicación')->groupBy('anio_publicacion')->get()->pluck('total', 'anio_publicacion');

            $publicaciones_items = Publicaciones::where('active', true)->where('tipo', 'publicación')->paginate(10);
            $url = route('publicaciones.show', 'todas');
        }

        return view('publicaciones.index', compact('publicaciones_items', 'categoria', 'anios', 'url'));
    }

    public function ver_publicacion($slug)
    {
        $publicacion = Publicaciones::where('slug', $slug)->first();
        return view('publicaciones.show', compact('publicacion'));
    }
    public function getFile(Publicaciones $file)
    {
        $file->download = $file->download + 1;
        $file->update();
        return response()->file(Storage::disk('public')->path($file->archivo));
    }

    public function colecciones($name, $anio = null)
    {
        if (strcmp('todas', $name) != 0) {
            $categoria = Categoria::where('name', $name)->first();
            $categoria->name = 'Colección - ' . $categoria->name;

            $anios = Publicaciones::select(DB::raw('count(anio_publicacion) as total'), 'active', 'tipo', 'anio_publicacion')->whereBelongsTo($categoria)->where('active', true)->groupBy('anio_publicacion')->get()->pluck('total', 'anio_publicacion');

            $publicaciones_items = Publicaciones::whereBelongsTo($categoria)->where('active', true)->paginate(10);
            $url = route('publicaciones.show', $categoria->name);
            return view('publicaciones.index', compact('publicaciones_items', 'categoria', 'anios'));
        }

        $anios = Publicaciones::select(DB::raw('count(anio_publicacion) as total'), 'active', 'tipo', 'anio_publicacion')->where('active', true)->where('tipo', 'colección')->groupBy('anio_publicacion')->get()->pluck('total', 'anio_publicacion');

        $categoria = new Categoria();
        $categoria->name = 'Todas las colecciones';

        $publicaciones_items = Publicaciones::where('active', true)->where('tipo', 'colección')->paginate(10);
        $url = route('publicaciones.colecciones', 'todas');
        return view('publicaciones.index', compact('publicaciones_items', 'categoria', 'anios', 'url'));
    }
    public function buscador(HttpRequest $request)
    {
        
        $result = Publicaciones::search($request->buscar)->paginate(10);
        $buscado = $request->buscar;
        return view('publicaciones.buscar', compact('result', 'buscado'));
    }
}
