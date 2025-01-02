<?php

namespace App\Console;

<<<<<<< HEAD
use Illuminate\Support\Facades\Cookie;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\BaseController;
=======
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
>>>>>>> tundeseun/devtest

class Kernel extends ConsoleKernel
{
    /**
<<<<<<< HEAD
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        'App\Console\Commands\DatabaseBackUp',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       
        $schedule->command('database:backup');

=======
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
>>>>>>> tundeseun/devtest
    }

    /**
     * Register the commands for the application.
<<<<<<< HEAD
     *
     * @return void
     */
    protected function commands()
=======
     */
    protected function commands(): void
>>>>>>> tundeseun/devtest
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
