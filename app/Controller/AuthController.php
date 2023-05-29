<?php

namespace App\Controller;

use App\Service\AuthService;
use Thumbsupcat\IcedAmericano\Support\Theme;

class AuthController
{
    public static function showLoginForm()
    {
        return Theme::view('auth', ['request_url' => '/auth']);
    }

    public static function login()
    {
        [$email => $password] = array_values(filter_input_array(INPUT_POST, [
            'email' => FILTER_VALIDATE_EMAIL | FILTER_SANITIZE_EMAIL,
            'password' => FILTER_DEFAULT
        ]));

        return AuthService::login($email, $password) ? header("Location: /") : header("location: " . $_SERVER['HTTP_REFERER']);
    }

    public static function logout()
    {
        return AuthService::logout();
    }
}