<?php

use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\RevistasController;
use App\Http\Middleware\TrackVisitors;
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

Route::middleware([TrackVisitors::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/directorio', [HomeController::class, 'directorio'])->name('directorio');

    Route::get('/consejo-editorial', [HomeController::class, 'comite'])->name('consejo.editorial');

    Route::resource('publicaciones', PublicacionesController::class)->except(['show']);

    Route::get('/publicaciones/{pubicacion}/{anio?}', [PublicacionesController::class, 'show'])->name('publicaciones.show');

    Route::get('/publicacion/{slug}', [PublicacionesController::class, 'ver_publicacion'])->name('ver-publicacion');

    Route::get('/colecciones/{colecciones}/{anio?}', [PublicacionesController::class, 'colecciones'])->name('publicaciones.colecciones');

    Route::get('/difucion/{tipo}', [RevistasController::class, 'index'])->name('difucion.index');

    Route::get('/download/{file}', [PublicacionesController::class, 'getFile'])->name('ver-archivo');

    Route::get('/buscador', [PublicacionesController::class, 'buscador'])->name('buscador');

    Route::get('/actividades/{tipo}', [ActividadesController::class, 'index'])->name('actividades.index');

});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/editorial/public/livewire/update', $handle);
});
