<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Middleware\HandlerApiAuth;

Route::post('login', [AuthApiController::class, 'login']);

Route::middleware([HandlerApiAuth::class, 'auth:sanctum', 'abilities:check-status,place-orders'])->group(function () {
    Route::get('auth', [AuthApiController::class, 'getUser']);
    Route::post('logout', [AuthApiController::class, 'logout']);
});
