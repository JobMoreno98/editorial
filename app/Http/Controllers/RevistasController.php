<?php

namespace App\Http\Controllers;

use App\Models\Revistas;
use Illuminate\Http\Request;

class RevistasController extends Controller
{
    public function index($tipo = 'Revista')
    {
        $revistas = Revistas::where('active', true)->where('tipo', $tipo)->paginate(10);
        return view('revistas.index', compact('revistas','tipo'));
    }
}
