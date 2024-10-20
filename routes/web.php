<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\RevistasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/directorio', [HomeController::class, 'directorio'])->name('directorio');

Route::get('/consejo-editorial', [HomeController::class, 'comite'])->name('consejo.editorial');

Route::resource('publicaciones', PublicacionesController::class)->except(['show']);

Route::get('/publicaciones/{pubicacion}/{anio?}',[PublicacionesController::class, 'show'])->name('publicaciones.show');

Route::get('/publicacion/{slug}', [PublicacionesController::class, 'ver_publicacion'])->name('ver-publicacion');

Route::get('/colecciones/{colecciones}/{anio?}', [PublicacionesController::class, 'colecciones'])->name('publicaciones.colecciones');

Route::get('/revistas-cientificas', [RevistasController::class, 'index'])->name('revistas.index');

Route::get('/download/{file}', [PublicacionesController::class, 'getFile'])->name('ver-archivo');

Route::get('/buscador', [PublicacionesController::class, 'buscador'])->name('buscador');
