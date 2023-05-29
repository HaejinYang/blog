<?php
namespace App\Controller;

class IndexController
{
    public static function index()
    {
        require dirname(__DIR__, 2).'/resources/index.php';
    }
}