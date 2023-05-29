<?php
namespace App\Provider;
use Thumbsupcat\IcedAmericano\Support\ServiceProvider;
use Thumbsupcat\IcedAmericano\Session\DatabaseSessionHandler;

class SessionServiceProvider extends ServiceProvider
{
    public static function register()
    {
        \session_set_save_handler(new DatabaseSessionHandler());
    }

    public static function boot()
    {
        \session_start();
    }
}