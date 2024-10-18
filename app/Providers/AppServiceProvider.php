<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\ConfiguracionSitio;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Pagination\Paginator;
//use Illuminate\Support\ServiceProvider;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DatabaseSizeCheck;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck;

use App\Policies\ActivityPolicy;
use App\Policies\BackupsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Gate;
use ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackup;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Update `Activity::class` with the one defined in `config/activitylog.php`
        Activity::class => ActivityPolicy::class,
        FilamentSpatieLaravelBackup::class => BackupsPolicy::class,
    ];

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
            DatabaseCheck::new(),
            SecurityAdvisoriesCheck::new(),
            DatabaseSizeCheck::new()
            ->failWhenSizeAboveGb(errorThresholdGb: 5.0),
        ]);
        Gate::policy(FilamentSpatieLaravelBackup::class, BackupsPolicy::class);
        Gate::policy(Activity::class, ActivityPolicy::class);
    }
}
