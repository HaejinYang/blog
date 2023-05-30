<?php

namespace App\Service;

use App\User;
use Thumbsupcat\IcedAmericano\Database\Adaptor;

class AuthService
{
    public static function login($email, $password): null|User
    {
        if (!$user = current(Adaptor::getAll("SELECT * FROM user WHERE `email` = ?", [$email], User::class))) {
            return null;
        }

        if (!\password_verify($password, $user->password)) {
            return null;
        }

        return $_SESSION['user'] = $user;
    }

    public static function logout(): bool
    {
        session_unset();

        return session_destroy();
    }

}