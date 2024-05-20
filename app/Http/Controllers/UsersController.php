<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;//Userモデルを使用するために追加

class UsersController extends Controller
{
    //ユーザー登録画面
    public function showregister()
    {
        return view('users.register'); // views/users/index.blade.php を表示する
    }

    //ユーザー情報を登録するためのメソッド
    public function register(UserRequest $request)
    {
        $user = new User; //Usersテーブルに新しく入力されたデータを取得
        $user->name = $request->name;
        $user->account = $request->account;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        Auth::login($user);
        return redirect()->route('mypage.mypage');
    }

    //マイページを表示
    public function mypage()
    {   
        return view('mypage.mypage');
    }
}