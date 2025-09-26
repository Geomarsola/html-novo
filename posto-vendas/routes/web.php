<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// Página inicial (welcome) → com botão "Entrar" que leva para login
Route::get('/', function () {
    return view('welcome');
});

// Produtos (será a Dashboard depois do login)
Route::get('/products', [ProductController::class, 'index'])->middleware('auth')->name('dashboard');

// Rotas de vendas
Route::get('/sales/create', [SaleController::class, 'create'])->middleware('auth');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store')->middleware('auth');

// Registro
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
