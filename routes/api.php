<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'login']);

Route::get('products', [ProductController::class, 'getProducts']);

Route::group(['middleware' => 'api.auth'], function () {
    Route::get('logout', [LoginController::class, 'logout']);
    Route::post('order', [OrderController::class, 'store']);
});
