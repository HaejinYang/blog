<?php

namespace App\Provider;

use Thumbsupcat\IcedAmericano\Support\ServiceProvider;

class TimeZoneServiceProvider extends ServiceProvider
{
    public static function register()
    {
        date_default_timezone_set('Asia/Seoul');
    }

    public static function boot()
    {
    }
}