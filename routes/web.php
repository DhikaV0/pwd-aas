<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', function () {
    return redirect()->route('login'); // Redirect ke halaman login
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route
Route::get('/dashboard', [MenuController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Menu-related routes
Route::middleware('auth')->group(function () {
    // Route to display menu list
    Route::get('/', [MenuController::class, 'show'])->name('.index');

    // Route to create a menu
    Route::get('/create', [MenuController::class, 'create'])->name('create');
    Route::post('/', [MenuController::class, 'store'])->name('store');

    // Route untuk menu
    Route::middleware('auth')->group(function () {
        Route::get('/menu', function () {
            return view('menu'); // Arahkan langsung ke views/menu.blade.php
        })->name('menu'); // Route untuk menu.blade.php
    });

    // Route to edit and update a menu
    Route::get('edit', [MenuController::class, 'edit'])->name('edit');
    Route::put('menu', [MenuController::class, 'update'])->name('update');

    // Route to delete a menu
    Route::delete('', [MenuController::class, 'destroy'])->name('destroy');
});

// Static pages
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});
