<?php

namespace App\Provider;

use Thumbsupcat\IcedAmericano\Support\ServiceProvider;
use Thumbsupcat\IcedAmericano\Routing\Route;

class RouteServiceProvider implements ServiceProvider
{
    public static function register()
    {
        foreach (['web', 'app'] as $name) {
            require_once dirname(__DIR__, 2) . "/route/{$name}.php";
        }
    }

    public static function boot()
    {
        Route::run();
    }
}