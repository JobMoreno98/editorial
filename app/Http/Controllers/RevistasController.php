<?php

namespace App\Http\Controllers;

use App\Models\Revistas;
use Illuminate\Http\Request;

class RevistasController extends Controller
{
    public function index()
    {
        $revistas  = Revistas::where('active', true)->paginate(10);
        return view('revistas.index', compact('revistas'));
    }
}
