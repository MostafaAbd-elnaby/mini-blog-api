<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Authintication Routes
Route::prefix('auth')->controller(LoginController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
});

Route::prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store')->middleware('auth:jwt');

    Route::prefix('{id}/comments')->controller(CommentController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store')->middleware('auth:jwt');;
    });
});
