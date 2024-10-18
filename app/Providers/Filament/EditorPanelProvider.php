<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Hasnayeen\Themes\Http\Middleware\SetTheme;

class EditorPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('editor')
            ->path('editor')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Editor/Resources'), for: 'App\\Filament\\Editor\\Resources')
            ->discoverPages(in: app_path('Filament/Editor/Pages'), for: 'App\\Filament\\Editor\\Pages')
            ->pages([Pages\Dashboard::class])
            ->discoverWidgets(in: app_path('Filament/Editor/Widgets'), for: 'App\\Filament\\Editor\\Widgets')
            ->widgets([
                //Widgets\AccountWidget::class,
                //Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class, 
            AddQueuedCookiesToResponse::class, 
            StartSession::class, AuthenticateSession::class, 
            ShareErrorsFromSession::class, VerifyCsrfToken::class, 
            SubstituteBindings::class, DisableBladeIconComponents::class, 
            DispatchServingFilamentEvent::class,
            SetTheme::class
            ])
            ->plugin(
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                        shouldRegisterNavigation: true, // Adds a main navigation item for the My Profile page (default = false)
                        navigationGroup: __('Settings'), // Sets the navigation group for the My Profile page (default = null)
                        hasAvatars: true, // Enables the avatar upload form component (default = false)
                        slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
                    )->enableTwoFactorAuthentication()
            )
            ->spa()
            ->authMiddleware([Authenticate::class]);
    }
}
