<?php
namespace App\Provider;
use Thumbsupcat\IcedAmericano\Support\ServiceProvider;
use Thumbsupcat\IcedAmericano\Support\Theme;

class ThemeServiceProvider extends ServiceProvider
{
    public static function register()
    {
        Theme::setLayout(dirname(__DIR__, 2).'/resources/views/layout/app.php');
    }

    public static function boot()
    {
    }
}