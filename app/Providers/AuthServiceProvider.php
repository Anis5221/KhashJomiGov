<?php

namespace App\Providers;

use App\Models\BondobostoApp;
use App\Models\KhashJomi;
use App\Models\User;
use App\Policies\BondobostoAppPolicy;
use App\Policies\KhashJomiPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        BondobostoApp::class => BondobostoAppPolicy::class,
        KhashJomi::class => KhashJomiPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function ($user) {
            return $user->role_id == User::DC || $user->role_id == User::AC_LAND;
        });

        Gate::define('manage-khashjomi', function ($user) {
            if ($user->role_id == User::AC_LAND) {
                return true;
            }
        });
        Gate::define('isTowshildeer', function ($user) {
            if ($user->isTowsilder()) {
                return true;
            }
        });
        Gate::define('isUno', function ($user) {
            if ($user->isUno()) {
                return true;
            }
        });
        Gate::define('isDc', function ($user) {
            if ($user->isDc()) {
                return true;
            }
        });
        Gate::define('isAdc', function ($user) {
            if ($user->isAdc()) {
                return true;
            }
        });
        Gate::define('isAdcRevinew', function ($user) {
            if ($user->isAdcRevinew()) {
                return true;
            }
        });
    }
}
