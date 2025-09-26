<?php

use App\Http\Controllers\SaleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/sales/create', [SaleController::class, 'create']);
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

Route::get('/products', [ProductController::class, 'index']);

Route::get('/', function () {
    return view('welcome'); // ou outra view que você queira
});


Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm']);
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
