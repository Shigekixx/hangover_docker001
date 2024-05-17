<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/',[UsersController::class,'index'])->name('users.index');
Route::POST('/users',[UsersController::class,'register'])->name('users.register');