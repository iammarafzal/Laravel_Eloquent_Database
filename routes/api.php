<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Profile and Posts Management
Route::post('/create-user', [UserController::class, 'store']);
Route::get('/user/{id}', [UserController::class, 'show']);
