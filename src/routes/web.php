<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;

Route::middleware('auth')->group(function () {
  Route::get('/', [ShopController::class, 'index']);
  Route::get('/search', [ShopController::class, 'search']);
  Route::get('/detail/{num}', [ShopController::class, 'detail']);

  Route::get('/favorite/{num}', [FavoriteController::class, 'favorite']);
  Route::get('/unfavorite/{num}', [FavoriteController::class, 'unfavorite']);

  Route::post('/reserve', [ShopController::class, 'reserve']);
  Route::delete('/delete', [ShopController::class, 'destroy']);

  Route::get('/mypage', [ShopController::class, 'mypage']);

});


Route::get('/register', [AuthController::class, 'getRegister']);
Route::post('/register', [AuthController::class, 'postRegister']);

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');;
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/logout', [AuthController::class, 'getLogout']);
