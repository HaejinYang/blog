<?php

namespace App\Controller;

use App\Service\UserService;
use App\User;
use Thumbsupcat\IcedAmericano\Support\Theme;

class UserController
{
    public static function create()
    {
        Theme::view('auth', [
            'request_url' => 'user'
        ]);
    }

    public static function store()
    {
        $user = new User();

        $user->email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
        $user->password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);

        return UserService::register($user) ? header("Location: /auth/login") : header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}