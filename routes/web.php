<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [MenuController::class, 'dashboard'])->name('dashboard');

Route::get('/create', function () {
    return view('create');
})->name('create')->middleware('auth');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
