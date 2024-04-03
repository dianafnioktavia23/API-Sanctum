<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/pengguna', function (Request $request) {
//     return $request->pengguna();
// })->middleware('auth:sanctum');

Route::post('/users', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('/users/login', [\App\Http\Controllers\UserController::class, 'login']);
