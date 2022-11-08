<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShoppingRequestController;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'index'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
   Route::apiResource('shopping_request',ShoppingRequestController::class);
});



