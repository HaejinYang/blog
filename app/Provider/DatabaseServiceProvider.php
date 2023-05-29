<?php

namespace App\Provider;

use Thumbsupcat\IcedAmericano\Support\ServiceProvider;
use Thumbsupcat\IcedAmericano\Database\Adaptor;

class DatabaseServiceProvider extends ServiceProvider
{
    public static function register()
    {
        $env = parse_ini_file(dirname(__DIR__, 2) . '/.env');
        $dsn = "mysql:dbname={$env['DB_NAME']};host={$env['DB_HOST']};port={$env['DB_PORT']}";
        Adaptor::setup($dsn, $env['DB_USER_ID'], $env['DB_USER_PASSWORD']);
    }

    public static function boot()
    {
        // 실행할 것이 없어서 비워둠.
    }
}