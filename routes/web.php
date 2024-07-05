<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('Register');
// });
//Route::post('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/register',[RegisterController::class,'index'])->name('Register');
Route::post('/register/create',[RegisterController::class,'create'])->name('Register.create');
