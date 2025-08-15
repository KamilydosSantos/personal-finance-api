<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/users/me', [UserController::class, 'show']);
    Route::put('/users/me', [UserController::class, 'update']);
    Route::delete('/users/me', [UserController::class, 'destroy']);
});

Route::post('/users', [UserController::class, 'store']);

Route::post('/login', [AuthController::class, 'login'])->name('login');