<?php

namespace App\Service;

use App\User;

class UserService
{
    public static function register(User $user): bool
    {
        return $user->create();
    }
}