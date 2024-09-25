<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\ConfiguracionSitio;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
            $switch->locales(['es', 'en', 'fr']); // also accepts a closure
        });
        $publicaciones = Categoria::select('name')->where('tipo','publicación')->get();
        $colecciones = Categoria::select('name')->where('tipo','colección')->get();
        $site = ConfiguracionSitio::latest()->first();
        View::share('site', $site);
        View::share('publicaciones', $publicaciones);
        View::share('colecciones', $colecciones);
        
        Health::checks([
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
        ]);
    }
}
