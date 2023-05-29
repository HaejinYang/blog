<?php

use Thumbsupcat\IcedAmericano\Routing\Route;
use App\Middleware\RequireMiddleware;
use App\Middleware\CsrfTokenMiddleware;
use App\Middleware\AuthMiddleware;

Route::add('get', '/', '\App\Controller\IndexController::index');
Route::add('get', '/auth/login', '\App\Controller\AuthController::showLoginForm');
Route::add('post', '/auth', '\App\Controller\AuthController::login', [RequireMiddleware::class, CsrfTokenMiddleware::class]);
Route::add('post', '/auth/logout', '\App\Controller\AuthController::logout');