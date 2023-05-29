<?php

namespace App\Service;

use App\User;
use Thumbsupcat\IcedAmericano\Database\Adaptor;

class AuthService
{
    public static function login($email, $function)
    {
        if (!$user = current(Adaptor::getAll("SELECT * FROM WHERE `email` = ?", [$email]), User::class)) {
            return;
        }

        if (!\password_verify($password, $user->password)) {
            return;
        }

        $_SESSION['user'] = $user;
    }

    public static function logout()
    {
        session_unset();

        return session_destroy();
    }

}