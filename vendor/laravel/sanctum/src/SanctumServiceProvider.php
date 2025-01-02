<?php

namespace Laravel\Sanctum;

use Illuminate\Auth\RequestGuard;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
=======
use Laravel\Sanctum\Console\Commands\PruneExpired;
>>>>>>> tundeseun/devtest
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

class SanctumServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'auth.guards.sanctum' => array_merge([
                'driver' => 'sanctum',
                'provider' => null,
            ], config('auth.guards.sanctum', [])),
        ]);

<<<<<<< HEAD
        if (! $this->app->configurationIsCached()) {
=======
        if (! app()->configurationIsCached()) {
>>>>>>> tundeseun/devtest
            $this->mergeConfigFrom(__DIR__.'/../config/sanctum.php', 'sanctum');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        if ($this->app->runningInConsole()) {
=======
        if (app()->runningInConsole()) {
>>>>>>> tundeseun/devtest
            $this->registerMigrations();

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'sanctum-migrations');

            $this->publishes([
                __DIR__.'/../config/sanctum.php' => config_path('sanctum.php'),
            ], 'sanctum-config');
<<<<<<< HEAD
=======

            $this->commands([
                PruneExpired::class,
            ]);
>>>>>>> tundeseun/devtest
        }

        $this->defineRoutes();
        $this->configureGuard();
        $this->configureMiddleware();
    }

    /**
     * Register Sanctum's migration files.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        if (Sanctum::shouldRunMigrations()) {
            return $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Define the Sanctum routes.
     *
     * @return void
     */
    protected function defineRoutes()
    {
<<<<<<< HEAD
        if ($this->app->routesAreCached() || config('sanctum.routes') === false) {
=======
        if (app()->routesAreCached() || config('sanctum.routes') === false) {
>>>>>>> tundeseun/devtest
            return;
        }

        Route::group(['prefix' => config('sanctum.prefix', 'sanctum')], function () {
            Route::get(
                '/csrf-cookie',
                CsrfCookieController::class.'@show'
<<<<<<< HEAD
            )->middleware('web');
=======
            )->middleware('web')->name('sanctum.csrf-cookie');
>>>>>>> tundeseun/devtest
        });
    }

    /**
     * Configure the Sanctum authentication guard.
     *
     * @return void
     */
    protected function configureGuard()
    {
        Auth::resolved(function ($auth) {
            $auth->extend('sanctum', function ($app, $name, array $config) use ($auth) {
                return tap($this->createGuard($auth, $config), function ($guard) {
                    app()->refresh('request', $guard, 'setRequest');
                });
            });
        });
    }

    /**
     * Register the guard.
     *
<<<<<<< HEAD
     * @param \Illuminate\Contracts\Auth\Factory  $auth
     * @param array $config
=======
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @param  array  $config
>>>>>>> tundeseun/devtest
     * @return RequestGuard
     */
    protected function createGuard($auth, $config)
    {
        return new RequestGuard(
            new Guard($auth, config('sanctum.expiration'), $config['provider']),
<<<<<<< HEAD
            $this->app['request'],
=======
            request(),
>>>>>>> tundeseun/devtest
            $auth->createUserProvider($config['provider'] ?? null)
        );
    }

    /**
     * Configure the Sanctum middleware and priority.
     *
     * @return void
     */
    protected function configureMiddleware()
    {
<<<<<<< HEAD
        $kernel = $this->app->make(Kernel::class);
=======
        $kernel = app()->make(Kernel::class);
>>>>>>> tundeseun/devtest

        $kernel->prependToMiddlewarePriority(EnsureFrontendRequestsAreStateful::class);
    }
}
