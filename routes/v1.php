<?php
use Illuminate\Support\Facades\Route;
Route::get('/menu', [\App\Http\Controllers\v1\HomeController::class, 'menu']);
Route::get('/home', [\App\Http\Controllers\v1\HomeController::class, 'index']);
Route::get('/category/{categoryName}', [\App\Http\Controllers\v1\CategoryPageController::class, 'index']);
