<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use App\Models\Comite;
use App\Models\ConfiguracionSitio;
use App\Models\Directorio;
use App\Models\Preguntas;
use App\Models\Publicaciones;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $site = ConfiguracionSitio::latest()->first();
        $novedades = Publicaciones::where('novedad', true)->orderBy('id', 'desc')->get()->take(10);
        $preguntas = Preguntas::where('active', true)->get();
        $noticias = Actividades::where('tipo', 'Noticia')->orderBy('fecha', 'desc')->where('active', true)->get()->take(10);
        return view('home', compact('site', 'novedades', 'preguntas', 'noticias'));
    }
    public function directorio()
    {
        $directorio = Directorio::whereNull('id_padre')->where('active', true)
            ->with('hijos')
            ->get();

        return view('directorio.index', compact('directorio'));
    }
    public function comite()
    {

        $comite = Comite::where('active', true)->get();
        return view('comite', compact('comite'));
    }
}
