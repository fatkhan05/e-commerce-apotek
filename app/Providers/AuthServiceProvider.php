<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('IsAdmin', function($user)
        {
            return $user->is_admin == 'admin';
        });

        Gate::define('IsUser', function($user)
        {
            return $user->is_admin == 'user';
        });

        Gate::define('IsAdminUser', function($user)
        {
            return $user->is_admin == 'admin' or 'user';
        });

        //
    }
}
