<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tipo = 'Noticia')
    {
        if (strcmp($tipo, 'Noticia') != 0) {
            return abort(404);
        }
        $actividades = Actividades::where('tipo', $tipo)->where('active', true)->orderBy('fecha', 'desc')->paginate(10);
        return view('actividades.index', compact('actividades', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function ver_actividad($tipo, $slug = '')
    {
        if (strcmp($tipo, 'Noticia') != 0) {
            return abort(404);
        }
        $actividad = Actividades::where('slug', $slug)->where('tipo', $tipo)->first();
        if (!isset($actividad->nombre)) {
            return abort(404);
        }
        return view('actividades.show', compact('actividad'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Actividades $actividades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actividades $actividades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actividades $actividades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actividades $actividades)
    {
        //
    }
}
