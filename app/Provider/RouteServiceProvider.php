<?php
namespace App\Provider;
use Thumbsupcat\IcedAmericano\Support\ServiceProvider;
use Thumbsupcat\IcedAmericano\Routing\Route;

class RouteServiceProvider extends ServiceProvider
{
    public static function register()
    {
        require_once dirname(__DIR__, 2) . '/route/web.php';
    }

    public static function boot()
    {
        Route::run();
    }
}