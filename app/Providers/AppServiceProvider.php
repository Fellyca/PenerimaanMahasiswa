<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\is_admin;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        // $this->app->middlleware([
        //     is_admin::class,
        // ]);

        // Gate::define(is_admin::class, function(User $user){
        //     return $user->is_admin;
        // });
    }
}
