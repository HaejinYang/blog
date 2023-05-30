<?php

namespace App\Controller;

use App\Service\ImageService;
use App\Service\Logger;

class ImageController
{
    private static $accepts = ['png', 'jpg'];
    private static $upload_directory = __DIR__ . '/../../storage/app/image/';

    public static function store()
    {
        if (!array_key_exists('upload', $_FILES)) {
            return http_response_code(400);
        }

        $file = $_FILES['upload'];
        $filename = $_SESSION['user']->id . '_' . time() . '_' . hash('md5', $file['name']);

        echo ImageService::create($file, self::$accepts, self::$upload_directory . $filename);

        return;
    }

    public static function show($path)
    {
        if (!preg_match('/\d_\d{10}_[0-9a-z]{32}/', $path)) {
            return http_response_code(400);
        }

        echo ImageService::read(self::$upload_directory . basename($path));
        return;
    }
}