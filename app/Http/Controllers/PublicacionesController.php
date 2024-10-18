<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Publicaciones;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PublicacionesController extends Controller
{
    public function show($name, $anio = null)
    {
        if (strcmp('todas', $name) != 0) {
            $categoria = Categoria::where('name', $name)->first();
            $categoria->name = 'Publicaciones de la categoria - ' . $categoria->name;

            $anios = Publicaciones::select(DB::raw('distinct(anio_publicacion) as anio'), 'active')->whereBelongsTo($categoria)->where('active', true)->orderBy('anio_publicacion','desc')->get();

            $url = route('publicaciones.show', $name);
            $publicaciones_items = Publicaciones::whereBelongsTo($categoria)
                ->where('active', true)
                ->when($anio, function (Builder $query, string $anio) {
                    $query->where('anio_publicacion', $anio);
                })
                ->paginate(10);
        } else {
            $categoria = new Categoria();
            $categoria->name = 'Todas las publicaciones';

            $anios = Publicaciones::select(DB::raw('distinct(anio_publicacion) as anio'), 'active')->where('active', true)->where('tipo', 'publicación')->orderBy('anio_publicacion','desc')->get();

            $publicaciones_items = Publicaciones::when($anio, function (Builder $query, string $anio) {
                $query->where('anio_publicacion', $anio);
            })
                ->where('active', true)
                ->where('tipo', 'publicación')
                ->paginate(10);
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

            $anios = Publicaciones::select(DB::raw('distinct(anio_publicacion) as anio'), 'active')->whereBelongsTo($categoria)->where('active', true)->orderBy('anio_publicacion','desc')->get();
            

            $publicaciones_items = Publicaciones::whereBelongsTo($categoria)
                ->when($anio, function (Builder $query, string $anio) {
                    $query->where('anio_publicacion', $anio);
                })
                ->where('active', true)
                ->paginate(10);

            $url = route('publicaciones.show', $name);
            return view('publicaciones.index', compact('publicaciones_items', 'categoria', 'anios', 'url'));
        }

        $anios = Publicaciones::select(DB::raw('distinct(anio_publicacion) as anio'), 'active', 'tipo', 'anio_publicacion')->where('active', true)->where('tipo', 'colección')->orderBy('anio_publicacion','desc')->get();

        $categoria = new Categoria();
        $categoria->name = 'Todas las colecciones';

        $publicaciones_items = Publicaciones::where('active', true)
            ->when($anio, function (Builder $query, string $anio) {
                $query->where('anio_publicacion', $anio);
            })
            ->where('tipo', 'colección')
            ->paginate(10);
        $url = route('publicaciones.colecciones', 'todas');
        return view('publicaciones.index', compact('publicaciones_items', 'categoria', 'anios', 'url'));
    }
    public function buscador(HttpRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'buscar' => 'required|min:3',
        ]);
        if ($validator->fails()) {
            return back()
                ->with('errors', $validator->messages()->all()[0])
                ->withInput();
        }
        $result = Publicaciones::search($request->buscar)->paginate(10);
        $buscado = $request->buscar;
        return view('publicaciones.buscar', compact('result', 'buscado'));
    }
}
