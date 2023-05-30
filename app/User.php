<?php

namespace App;

use Thumbsupcat\IcedAmericano\Database\Adaptor;

class User
{
    public function create(): bool
    {
        return Adaptor::exec("INSERT INTO user(`email`, `password`) VALUES(?, ?)", [$this->email, $this->password]);
    }

    public function getUsername(): string
    {
        return current(explode('@', $this->email));
    }
}