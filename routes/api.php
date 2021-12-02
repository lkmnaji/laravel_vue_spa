<?php

use App\Http\Controllers\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product/post', [ProductController::class, 'store'])->name('product.store');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product');
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

