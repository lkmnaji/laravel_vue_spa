<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product/post', [ProductController::class, 'store'])->name('product.store');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product');
    Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');


// Route::get('/product', [ProductController::class, 'index'])->name('product.index');
// Route::post('/product/post', [ProductController::class, 'store'])->name('product.store');
// Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
// Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product');
// Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

