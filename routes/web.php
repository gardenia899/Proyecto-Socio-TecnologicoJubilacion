<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|-----------------------------
| INICIO & LOGIN
|-----------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

/*
|-----------------------------
| REGISTRO
|-----------------------------
*/
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

/*
|-----------------------------
| DASHBOARD (PROTEGIDO)
|-----------------------------
*/
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

/*
|-----------------------------
| LOGOUT
|-----------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');