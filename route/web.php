<?php

use Thumbsupcat\IcedAmericano\Routing\Route;
use App\Middleware\RequireMiddleware;
use App\Middleware\CsrfTokenMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\PostMiddleware;

Route::add('get', '/', '\App\Controller\IndexController::index');

// auth
Route::add('get', '/auth/login', '\App\Controller\AuthController::showLoginForm');
Route::add('post', '/auth', '\App\Controller\AuthController::login', [RequireMiddleware::class, CsrfTokenMiddleware::class]);
Route::add('post', '/auth/logout', '\App\Controller\AuthController::logout');

// user
Route::add('get', '/user/register', '\App\Controller\UserController::create');
Route::add('post', '/user', '\App\Controller\UserController::store', [RequireMiddleware::class, CsrfTokenMiddleware::class]);

// post
Route::add('get', '/post/write', '\App\Controller\PostController::create', [AuthMiddleware::class]);
Route::add('post', '/post', '\App\Controller\PostController::store', [AuthMiddleware::class, RequireMiddleware::class, CsrfTokenMiddleware::class]);
Route::add('get', '/post/{id}', '\App\Controller\PostController::show');
Route::add('get', '/post/{id}/edit', '\App\Controller\PostController::edit', [AuthMiddleware::class, PostMiddleware::class]);
Route::add('patch', '/post/{id}', '\App\Controller\PostController::update', [AuthMiddleware::class, RequireMiddleware::class, CsrfTokenMiddleware::class, PostMiddleware::class]);
Route::add('delete', '/post/{id}', '\App\Controller\PostController::destroy', [AuthMiddleware::class, RequireMiddleware::class, CsrfTokenMiddleware::class, PostMiddleware::class]);
