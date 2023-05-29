<?php
namespace App\Provider;
use Thumbsupcat\IcedAmericano\Support\ServiceProvider;

class ErrorServiceProvider extends ServiceProvider
{
    public static function register()
    {
        set_error_handler(function ($errno, $errstr, $errfile, $errline){
           throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
        });

        set_exception_handler(function ($e){
            error_log("[".date('y-m-d H:i:s')."]".$e.PHP_EOL, 3, dirname(__DIR__, 2).'/storage/logs/logs.log');
        });
    }

    public static function boot()
    {
    // nothing
    }
}