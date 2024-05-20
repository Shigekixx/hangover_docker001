<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;//Userモデルを使用するために追加


class LoginController extends Controller
{
    //ログイン画面の表示
    public function showlogin()
    {
        return view('login.login');
    }

    //ログインメソッド
    public function login(UserLoginRequest $request)
    {
        return $request->authenticate(); // マイページにリダイレクト
    }
}
