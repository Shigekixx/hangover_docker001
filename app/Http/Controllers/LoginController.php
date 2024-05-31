<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;//Userモデルを使用するために追加


class LoginController extends Controller
{
    //年齢確認ページの表示
    public function confirm()
    {
        return view('login.confirm');
    }

    //ログイン画面の表示
    public function showlogin()
    {
        return view('login.login');
    }

    //ログイン機能
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('users.mypage'); // ログイン後のリダイレクト先を指定
        }

        return back()->withErrors(['email' => 'メールアドレス・パスワードに不備があります']); // ログイン画面に戻る
    }

    //ログアウト機能
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
