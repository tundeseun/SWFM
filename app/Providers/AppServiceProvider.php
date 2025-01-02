<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Laravel\Passport\Console\ClientCommand;
use Laravel\Passport\Console\InstallCommand;
use Laravel\Passport\Console\KeysCommand;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Schema;

=======
>>>>>>> tundeseun/devtest

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
<<<<<<< HEAD
     *
     * @return void
     */
    public function register()
=======
     */
    public function register(): void
>>>>>>> tundeseun/devtest
    {
        //
    }

    /**
     * Bootstrap any application services.
<<<<<<< HEAD
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
         /*ADD THIS LINES*/
        $this->commands([
            InstallCommand::class,
            ClientCommand::class,
            KeysCommand::class,
        ]);

         // Set the default guard to 'store' for all 'store/*' routes
        $this->app['router']->matched(function (\Illuminate\Routing\Events\RouteMatched $event) {
            if ($event->route->action['middleware'] === 'auth.store') {
                Auth::shouldUse('store');
            }
        });
=======
     */
    public function boot(): void
    {
        //
>>>>>>> tundeseun/devtest
    }
}
