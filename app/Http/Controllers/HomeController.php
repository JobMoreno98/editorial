<?php

namespace App\Http\Controllers;

use App\Models\Comite;
use App\Models\ConfiguracionSitio;
use App\Models\Directorio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $site = ConfiguracionSitio::latest()->first();
        return view('home', compact('site'));
    }
    public function directorio()
    {
        $directorio = Directorio::all();
        return view('directorio', compact('directorio'));
    }
    public function comite()
    {
        $comite = Comite::where('active',true)->get();
        return view('comite', compact('comite'));
    }
}
