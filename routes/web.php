<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\AccountUpdateController;
use App\Http\Controllers\UserUpdateController;
use App\Http\Controllers\CommentController;

Route::get('/',[LoginController::class,'showlogin'])->name('login.showlogin');
Route::POST('/login',[LoginController::class,'login'])->name('login.login');

Route::get('/users',[UsersController::class,'showregister'])->name('users.showregister');
Route::POST('/users',[UsersController::class,'register'])->name('users.register');

Route::group(['middleware' => 'auth'], function () {
    //マイページ表示
    Route::get('/mypage',[UsersController::class,'mypage'])->name('users.mypage');
    //記録登録処理
    Route::POST('/mypage',[DiaryController::class,'diary'])->name('diary.diary');
    Route::delete('/mypage',[UsersController::class,'userdelete'])->name('users.userdelete');
    //アカウント名の変更
    Route::get('/mypage/{account}',[AccountUpdateController::class,'accountupdatepage'])->name('users.accountupdatepage');
    Route::put('/mypage/{account}',[AccountUpdateController::class,'accountupdate'])->name('users.accountupdate');
    //メールアドレス・パスワードの変更
    Route::get('/mypage/{update}/update',[UserUpdateController::class,'userupdatepage'])->name('users.userupdatepage');
    Route::put('/mypage/{update}/update',[UserUpdateController::class,'userupdate'])->name('users.userupdate');
    //ログアウトの処理
    Route::POST('/logout',[LoginController::class,'logout'])->name('login.logout');
    //記録ページ系のルーティング
    Route::get('/diary',[DiaryController::class,'index'])->name('diary.index');
    Route::get('/diary/{id}',[DiaryController::class,'show'])->name('diary.show');
    Route::delete('/diary/{id}',[DiaryController::class,'delete'])->name('diary.delete');
    Route::get('/diary/{id}/updatepage',[DiaryController::class,'updatepage'])->name('diary.updatepage');  
    Route::put('/diary/{id}/updatepage',[DiaryController::class,'update'])->name('diary.update');   
    
    //Diaryのコメント
    Route::POST('/diary/{id}/comment',[CommentController::class,'store'])->name('comment.store');
    Route::delete('/diary/{id}/comment',[CommentController::class,'destroy'])->name('comment.destroy');

});
