<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ExternalApiController;

// Default route for the welcome page
Route::get('/', [PostController::class, 'index']);


// Authentication routes (login, register, etc.)
Auth::routes();

// Resource routes for posts (CRUD functionality)
Route::resource('posts', PostController::class);

Route::get('/external-posts', [ExternalApiController::class, 'fetchPosts'])->name('external.posts');
