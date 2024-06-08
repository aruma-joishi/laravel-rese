<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify', function () {
  return view('verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware('verified')->group(function () {

  Route::get('/', [ShopController::class, 'index']);
  Route::get('/search', [ShopController::class, 'search']);
  Route::get('/detail/{num}', [ShopController::class, 'detail']);

  Route::post('/reserve', [ShopController::class, 'reserve']);
  Route::patch('/update', [ShopController::class, 'update']);
  Route::delete('/delete', [ShopController::class, 'destroy']);

  Route::get('/mypage', [ShopController::class, 'mypage']);

  Route::get('/favorite/{num}', [FavoriteController::class, 'favorite']);
  Route::get('/unfavorite/{num}', [FavoriteController::class, 'unfavorite']);



});


Route::get('/register', [AuthController::class, 'getRegister']);
Route::post('/register', [AuthController::class, 'postRegister']);

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');;
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/logout', [AuthController::class, 'getLogout']);