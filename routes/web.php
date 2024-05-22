<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DiaryController;

Route::get('/',[LoginController::class,'showlogin'])->name('login.showlogin');
Route::POST('/login',[LoginController::class,'login'])->name('login.login');

Route::get('/users',[UsersController::class,'showregister'])->name('users.showregister');
Route::POST('/users',[UsersController::class,'register'])->name('users.register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/mypage',[UsersController::class,'mypage'])->name('users.mypage');
    Route::POST('/mypage',[DiaryController::class,'diary'])->name('diary.diary');
    Route::POST('/logout',[LoginController::class,'logout'])->name('login.logout');
    Route::get('/index',[DiaryController::class,'index'])->name('diary.index');
    Route::delete('/index/{id}',[DiaryController::class,'delete'])->name('diary.delete');
    Route::get('/update/{id}',[DiaryController::class,'updatepage'])->name('diary.updatepage');  
    Route::put('/update/{id}',[DiaryController::class,'update'])->name('diary.update');    
    Route::get('/index/{id}',[DiaryController::class,'show'])->name('diary.show');
});
