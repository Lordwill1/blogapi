<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

// Public routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
    
    Route::post('posts', [PostController::class, 'store']);
    Route::delete('posts/{id}', [PostController::class, 'destroy']);
});

// Default welcome route
Route::get('/', function () {
    return view('welcome');
});
