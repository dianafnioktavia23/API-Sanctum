<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/pengguna', function (Request $request) {
//     return $request->pengguna();
// })->middleware('auth:sanctum');

//routes untuk api userxam
Route::post('/users', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('/users/login', [\App\Http\Controllers\UserController::class, 'login']);
Route::get('/users/current', [\App\Http\Controllers\UserController::class, 'getuser']);
Route::delete('/users/logout', [\App\Http\Controllers\UserController::class, 'logout']);

//routes untuk api menu
Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'getmenu']);
Route::get('/menu/default', [\App\Http\Controllers\MenuController::class, 'getOrderedMenu']);
Route::get('/menu/best', [\App\Http\Controllers\MenuController::class, 'bestSeller']);
Route::get('/menu/rekomendasi', [\App\Http\Controllers\MenuController::class, 'rekomendasi']);
Route::get('/menu/{id}', [\App\Http\Controllers\MenuController::class, 'show']);
Route::get('/menu/kategori/{id}', [\App\Http\Controllers\MenuController::class, 'getMenuByCategory']);

//routes untuk api pemesanan
Route::post('/pemesanan', [\App\Http\Controllers\PemesananController::class, 'store']);//belom
Route::get('/pemesanan/{id}', [\App\Http\Controllers\PemesananController::class, 'details']);
Route::get('/history', [\App\Http\Controllers\PemesananController::class, 'index']);

//routes untuk api review 
Route::apiResource('reviews', ReviewController::class)->only(['store']);
Route::get('/reviews/{id}', [ReviewController::class, 'showById']);
Route::get('/reviews', [ReviewController::class, 'showReview']);

//routes untuk api kategori
Route::get('/kategori', [\App\Http\Controllers\KategoriController::class, 'listkategori']);

//routes untuk api MEJA 
Route::get('/meja', [\App\Http\Controllers\MejaController::class, 'listmeja']);
Route::get('/meja/kosong', [\App\Http\Controllers\MejaController::class, 'mejakosong']);


//send message emaiL

Route::post('/send-email', [EmailController::class, 'sendEmail']);
// Route::middleware(\App\Http\Controllers\UserController::class)->group(function(){
//     Route::get('/users/current', [\App\Http\Controllers\UserController::class, 'getuser']);
//     Route::delete('/users/logout', [\App\Http\Controllers\UserController::class, 'logout']);
// });