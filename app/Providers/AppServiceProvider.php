<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\ConfiguracionSitio;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;

class AppServiceProvider extends ServiceProvider
{
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
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch->locales(['es', 'en']);
        });

        view()->composer('layout.app', function ($view) {
            $site = ConfiguracionSitio::latest()->first();
            $publicaciones = Categoria::select('name')->where('tipo', 'publicación')->get();
            $colecciones = Categoria::select('name')->where('tipo', 'colección')->get();

            $view->with('colecciones', $colecciones)->with('publicaciones', $publicaciones)->with('site', $site);
        });

        Health::checks([
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
        ]);
    }
}
