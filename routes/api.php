<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('admin-login', [\App\Http\Controllers\AuthController::class, 'adminLogin']);
Route::get('subscriber-login/{login_option}', [\App\Http\Controllers\AuthController::class, 'subscriberLogin']);
Route::get('test', [\App\Http\Controllers\AuthController::class, 'test']);
