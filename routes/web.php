<?php

use HappyToDev\Typhoon\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use HappyToDev\Typhoon\Http\Controllers\PostController;
use HappyToDev\Typhoon\Http\Controllers\IndexController;

// Route::get('/posts', function () {
//     return ('test');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/index', [IndexController::class, 'index'])->name('index.index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');