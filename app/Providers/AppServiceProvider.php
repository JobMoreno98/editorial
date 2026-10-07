<?php

namespace App\Providers;

use App\Models\Actividades;
use App\Models\Categoria;
use App\Models\ConfiguracionSitio;
use Illuminate\Pagination\Paginator;
//use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    protected $site;

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        config(['app.timezone' => 'America/Mexico_City']);
        $this->site = ConfiguracionSitio::latest()->first();

        config(['app.name' => $this->site->nombre]);
        view()->composer('layout.app', function ($view) {
            $publicaciones = Categoria::select('name')->where('tipo', 'publicación')->get();
            $colecciones = Categoria::select('name')->where('tipo', 'colección')->get();
            $noticias = Actividades::where('tipo', 'Noticia')->where('active', true)->count();
            $view->with('colecciones', $colecciones)
            ->with('publicaciones', $publicaciones)
            ->with('site', $this->site)
            ->with('noticias', $noticias);
        });

    }
}
