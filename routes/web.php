<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('Register');
// });
//Route::post('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/register',[RegisterController::class,'index'])->name('Register');
Route::post('/register/create',[RegisterController::class,'create'])->name('Register.create');
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginCheck', [LoginController::class, 'loginCheck'])->name('loginCheck');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
