<?php

namespace App\Controller;

use App\Post;
use App\Service\PostService;
use Thumbsupcat\IcedAmericano\Support\Theme;

class PostController
{
    public static function create()
    {
        return Theme::view('post', [
            'request_url' => '/post',
        ]);
    }

    public static function store()
    {
        $post = new Post();

        $post->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $post->content = filter_input(INPUT_POST, 'content');
        $post->user_id = $_SESSION['user']->id;

        return PostService::write($post) ? header("Location: /") : header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function edit($id)
    {
        $post = Post::get($id);

        return Theme::view('post',
            ['post' => $post, 'request_url' => '/post/' . $post->id, 'method' => 'patch']);
    }

    public static function update($id)
    {
        $post = Post::get($id);

        // method가 patch인데 왜 POST로? 실제 날라오는건 POST로 날라오기 때문. patch로 라우터에서만 구별
        $post->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $post->content = filter_input(INPUT_POST, 'content');

        return PostService::update($post) ? header("Location: /post/" . $post->id) : header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public static function destroy($id)
    {
        $post = Post::get($id);

        return PostService::delete($post) ? http_response_code(204) : http_response_code(404);
    }

    public static function show($id)
    {
        $post = Post::get($id);
        if (!$post) {
            return http_response_code(404);
        }

        return Theme::view('read', compact('post'));
    }
}