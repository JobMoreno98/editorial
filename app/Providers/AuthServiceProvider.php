<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Models\User;
use App\Policies\ActivityPolicy;
use App\Policies\BackupsPolicy;
use App\Policies\PermisosPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Policies\RolesPolicy;
use ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackup;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \Spatie\Activitylog\Models\Activity;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true : null;
        });
        
        Gate::policy(Role::class, RolesPolicy::class);
        Gate::policy(Permission::class, PermisosPolicy::class);
        Gate::policy(FilamentSpatieLaravelBackup::class, BackupsPolicy::class);
        Gate::policy(Activity::class, ActivityPolicy::class);
    }
}
