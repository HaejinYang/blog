<?php

namespace App\Service;

use Thumbsupcat\IcedAmericano\Database\Adaptor;

class IndexService
{
    public static function getPosts(int $page, int $count)
    {
        return Adaptor::getAll('SELECT * FROM post ORDER BY id DESC LIMIT ' . $count . ' OFFSET ' . $page * $count, [], \App\Post::class);
    }
}
