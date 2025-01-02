<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
<<<<<<< HEAD
=======
use Illuminate\Foundation\Application;
>>>>>>> tundeseun/devtest

trait CreatesApplication
{
    /**
     * Creates the application.
<<<<<<< HEAD
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
=======
     */
    public function createApplication(): Application
>>>>>>> tundeseun/devtest
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
