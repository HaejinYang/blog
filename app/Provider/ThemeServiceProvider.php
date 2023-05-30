<?php

namespace App\Provider;

use Thumbsupcat\IcedAmericano\Support\ServiceProvider;
use Thumbsupcat\IcedAmericano\Support\Theme;

class ThemeServiceProvider implements ServiceProvider
{
    public static function register()
    {
        Theme::setLayout(dirname(__DIR__, 2) . '/resource/view/layout/app.php');
    }

    public static function boot()
    {
    }
}