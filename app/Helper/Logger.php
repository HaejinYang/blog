<?php

namespace App\Helper;

class Logger
{
    public static function log($msg)
    {
        error_log("[" . date('y-m-d H:i:s') . "]" . $msg . PHP_EOL, 3, dirname(__DIR__, 2) . '/storage/logs/logs.log');
    }
}