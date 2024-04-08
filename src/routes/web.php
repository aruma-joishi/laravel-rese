<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;

//Route::middleware('auth')->group(function () {
  Route::get('/', [ShopController::class, 'index']);
  Route::get('/detail/{num}', [ShopController::class, 'detail']);
//});


Route::get('/register', [AuthController::class, 'getRegister']);
Route::post('/register', [AuthController::class, 'postRegister']);

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');;
Route::post('/login', [AuthController::class, 'postLogin']);
