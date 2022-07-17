<?php

use Illuminate\Support\Facades\Route;
use HappyToDev\Typhoon\Http\Controllers\HomeController;
use HappyToDev\Typhoon\Http\Controllers\PageController;
use HappyToDev\Typhoon\Http\Controllers\PostController;
use HappyToDev\Typhoon\Http\Controllers\IndexController;

// Route::get('/posts', function () {
//     return ('test');
// });

Route::get('/hometest   ', [HomeController::class, 'index'])->name('home');
Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/index', [IndexController::class, 'index'])->name('index.index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/page/{slug}', [PageController::class, 'index'])->name('page.index');

// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');