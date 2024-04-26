<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/pengguna', function (Request $request) {
//     return $request->pengguna();
// })->middleware('auth:sanctum');

Route::post('/users', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('/users/login', [\App\Http\Controllers\UserController::class, 'login']);
Route::get('/users/current', [\App\Http\Controllers\UserController::class, 'getuser']);
Route::delete('/users/logout', [\App\Http\Controllers\UserController::class, 'logout']);


Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'getmenu']);
Route::get('/menu/{id}', [\App\Http\Controllers\MenuController::class, 'show']);
Route::get('/menu/kategori/{id}', [\App\Http\Controllers\MenuController::class, 'getMenuByCategory']);

Route::post('/pemesanan', [\App\Http\Controllers\PemesananController::class, 'store']);
Route::get('/pemesanan/{id}', [\App\Http\Controllers\PemesananController::class, 'details']);
Route::get('/history', [\App\Http\Controllers\PemesananController::class, 'index']);

Route::apiResource('reviews', ReviewController::class)->only(['store']);
Route::get('menu/{menu_id}/reviews', [ReviewController::class, 'showByMenu']);
Route::get('/reviews', [ReviewController::class, 'showReview']);


// Route::middleware(\App\Http\Controllers\UserController::class)->group(function(){
//     Route::get('/users/current', [\App\Http\Controllers\UserController::class, 'getuser']);
//     Route::delete('/users/logout', [\App\Http\Controllers\UserController::class, 'logout']);
// });