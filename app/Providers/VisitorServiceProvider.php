<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Visitor;
use Illuminate\View\View ;

class VisitorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       
        //View::share('visitorCount', Visitor::count() );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       // $this->app['router']->pushMiddlewareToGroup('web', \App\Http\Middleware\TrackVisitors::class);

    }
}
