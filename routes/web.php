<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Default route for the welcome page
Route::get('/', [PostController::class, 'index']);


// Authentication routes (login, register, etc.)
Auth::routes();

// Resource routes for posts (CRUD functionality)
Route::resource('posts', PostController::class);
