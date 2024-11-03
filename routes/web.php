<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Default route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes (login, register, etc.)
Auth::routes();

// Route to the home page after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Resource routes for posts (CRUD functionality)
Route::resource('posts', PostController::class);
