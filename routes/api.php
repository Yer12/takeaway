<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\MenuController;

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

Route::name('authentication-')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('jwt.verify');
});

Route::get('/restaurants', [RestaurantsController::class, 'index']);

Route::get('/menu/{id}', [MenuController::class, 'show'])->where('id', '[0-9]+')->name('menu.show');

/**
 * Order' routes
 */
Route::middleware('jwt.verify')->group(function () {
    Route::get('/orders', [OrderController::class, 'show'])->name('order.show');
    Route::post('/orders', [OrderController::class, 'createOrder'])->name('order.create');
});
