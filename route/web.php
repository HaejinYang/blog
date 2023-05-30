<?php

use Thumbsupcat\IcedAmericano\Routing\Route;
use App\Middleware\RequireMiddleware;
use App\Middleware\CsrfTokenMiddleware;
use App\Middleware\AuthMiddleware;

Route::add('get', '/', '\App\Controller\IndexController::index');

// auth
Route::add('get', '/auth/login', '\App\Controller\AuthController::showLoginForm');
Route::add('post', '/auth', '\App\Controller\AuthController::login', [RequireMiddleware::class, CsrfTokenMiddleware::class]);
Route::add('post', '/auth/logout', '\App\Controller\AuthController::logout');

// user
Route::add('get', '/user/register', '\App\Controller\UserController::create');
Route::add('post', '/user', '\App\Controller\UserController::store', [RequireMiddleware::class, CsrfTokenMiddleware::class]);
