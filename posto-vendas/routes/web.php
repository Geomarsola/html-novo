<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------
// ROTAS PROTEGIDAS (precisa estar logado)
// ----------------------
Route::middleware('auth')->group(function () {

    // -------------------
    // Frentista
    // -------------------
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

    // -------------------
    // Admin
    // -------------------
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Criar usuário (frentista)
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
    });
});