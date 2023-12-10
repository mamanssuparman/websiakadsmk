<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        // Hak Akses Super Admin
        Gate::define('isSuperAdmin', function($user){
            return $user->role == 'Super Admin';
        });

        // Hak Akses Admin
        Gate::define('isAdmin', function($user){
            return $user->role == 'Admin';
        });
    }
}
