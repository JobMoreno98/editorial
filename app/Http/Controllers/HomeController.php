<?php

namespace App\Http\Controllers;

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
        $novedades = Publicaciones::where('novedad', true)->orderBy('id', 'desc')->get();
        $preguntas = Preguntas::where('active', true)->get();
        return view('home', compact('site', 'novedades','preguntas'));
    }
    public function directorio()
    {
        $directorio = Directorio::where('active', true)->orderBy('id_padre')->get();
        return view('directorio', compact('directorio'));
    }
    public function comite()
    {
        $comite = Comite::where('active', true)->get();
        return view('comite', compact('comite'));
    }
}
