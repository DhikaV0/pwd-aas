<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuCreateController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', function () {
    return redirect()->route('login'); // Redirect to the login page
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
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

    Route::middleware('auth')->group(function () {
        Route::get('/menus/create', [MenuCreateController::class, 'create'])->name('menus.create');
        Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
    });

    // Routes for editing and updating menu
    Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');

    // Category routes
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');  // Show categories
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');  // Store a new category
    Route::get('/categories', [CategoryController::class, 'index'])->name('menus.category');

    // Route to delete a menu
    Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
});

// Static pages
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});
