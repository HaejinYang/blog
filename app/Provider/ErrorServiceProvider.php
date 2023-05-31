<?php

namespace App\Provider;

use App\Helper\Logger;
use Thumbsupcat\IcedAmericano\Support\ServiceProvider;

class ErrorServiceProvider implements ServiceProvider
{
    public static function register()
    {
        set_error_handler(function ($errno, $errstr, $errfile, $errline) {
            throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
        });

        set_exception_handler(function ($e) {
            Logger::log($e->__toString());
        });
    }

    public static function boot()
    {
        // 실행할 것이 없어서 비워둠.
    }
}