<?php

use \App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', Admin\CategoryController::class);
Route::prefix('categories')->group(function (){
   Route::post('rearrange', [Admin\CategoryController::class, 'reArrange']);
});

Route::apiResource('sub-category', Admin\SubCategoryController::class)->parameters(['sub_category']);
Route::prefix('sub-category')->group(function (){
    Route::post('rearrange', [Admin\SubCategoryController::class, 'reArrange']);
});

Route::apiResource('movies', Admin\MovieController::class);
