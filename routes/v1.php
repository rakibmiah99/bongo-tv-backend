<?php
use Illuminate\Support\Facades\Route;
Route::get('/menu', [\App\Http\Controllers\v1\HomeController::class, 'menu']);
Route::get('/home', [\App\Http\Controllers\v1\HomeController::class, 'index']);
Route::get('/category/{categoryName}', [\App\Http\Controllers\v1\CategoryPageController::class, 'index']);
Route::get('/movies/{slug}', [\App\Http\Controllers\v1\MovieController::class, 'details']);


Route::prefix('account')->middleware(['auth:sanctum'])->group(function (){
    Route::get('/favourite', [\App\Http\Controllers\v1\AccountController::class, 'getFavourite']);
    Route::get('/likes', [\App\Http\Controllers\v1\AccountController::class, 'getLikes']);
    Route::get('/play-list-movies', [\App\Http\Controllers\v1\AccountController::class, 'getPlayList']);
    Route::get('/watch-histories', [\App\Http\Controllers\v1\AccountController::class, 'getWatchHistories']);
    Route::post('/favourite/action', [\App\Http\Controllers\v1\AccountController::class, 'actionFavourite']);
});
