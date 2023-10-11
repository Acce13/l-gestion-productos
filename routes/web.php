<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function() {
    Route::get('/', HomeController::class);
    Route::resource('categories', CategoryController::class)->middleware('user.only');
    Route::resource('products', ProductController::class)->middleware('user.only');
    Route::resource('users', UserController::class)->middleware('user.only');
    Route::resource('orders', OrderController::class);
});
