<?php

use Illuminate\Support\Facades\Route;
use HappyToDev\Typhoon\Http\Controllers\HomeController;
use HappyToDev\Typhoon\Http\Controllers\PageController;
use HappyToDev\Typhoon\Http\Controllers\PostController;
use HappyToDev\Typhoon\Http\Controllers\IndexController;

Route::middleware(['web'])->group(function () {
 
    Route::get('/hometest', [HomeController::class, 'index'])->name('home');

    Route::get('/', [PageController::class, 'index'])->name('home');

    Route::get('/index', [IndexController::class, 'index'])->name('index.index');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/page/{slug}', [PageController::class, 'index'])->name('page.index');
});

Route::redirect('/login', '/admin/login')->name('login');
