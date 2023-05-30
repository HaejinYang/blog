<?php

namespace App\Service;

class ImageService
{
    public static function create($file, $accepts, $filename)
    {
        $fileinfo = new \SplFileInfo($file['name']);

        if (!(in_array(strtolower($fileinfo->getExtension()), $accepts) && is_uploaded_file($file['tmp_name']))) {
            return false;
        }

        if (!move_uploaded_file($file['tmp_name'], $filename)) {
            return false;
        }

        return json_encode([
            'uploaded' => 1,
            'url' => '/image/' . basename($filename)
        ]);
    }

    public static function read($path)
    {
        if (file_exists($path)) {
            header('Content-type: ' . mime_content_type($path));

            return file_get_contents($path);
        }
    }
}