<?php

namespace App\Middleware;

use App\Service\Logger;
use \Thumbsupcat\IcedAmericano\Routing\Middleware;

class AuthMiddleware extends Middleware
{
    public static function process()
    {
        return array_key_exists('user', $_SESSION) ?: header('Location: /auth/login');
    }
}