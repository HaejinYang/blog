<?php

use Thumbsupcat\IcedAmericano\Routing\Route;
use App\Middleware\AuthMiddleware;

Route::add('post', '/image', '\App\Controller\ImageController::store', [AuthMiddleware::class]);
Route::add('get', '/image/{path}', '\App\Controller\ImageController::show');