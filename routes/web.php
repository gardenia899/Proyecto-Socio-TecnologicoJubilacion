<?php

use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
