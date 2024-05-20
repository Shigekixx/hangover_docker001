<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;


Route::get('/',[LoginController::class,'showlogin'])->name('login.showlogin');
Route::POST('/login',[LoginController::class,'login'])->name('login.login');

Route::get('/users',[UsersController::class,'showregister'])->name('users.showregister');
Route::POST('/users',[UsersController::class,'register'])->name('users.register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/mypage',[UsersController::class,'mypage'])->name('mypage.mypage');
    Route::POST('/mypage',[UsersController::class,'diary'])->name('mypage.diary');
});