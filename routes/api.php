<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'index'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('users/{user}', [LoginController::class, 'show']);
});

// Route::get('users/{user}', [LoginController::class, 'getUsers']);
