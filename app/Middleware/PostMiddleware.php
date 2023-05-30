<?php

namespace App\Middleware;

use App\Post;
use App\Service\Logger;
use Thumbsupcat\IcedAmericano\Routing\Middleware;

class PostMiddleware extends Middleware
{
    public static function process()
    {
        $post_id = filter_input(INPUT_POST, 'id');
        $post = Post::get($post_id);
        if (!$post) {
            return http_response_code(404);
        }

        if (!$post->isOwner()) {
            return http_response_code(404);
        }

        return true;
    }
}