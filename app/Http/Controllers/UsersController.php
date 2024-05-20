<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\DiaryRequest;
use App\Models\User;//Userモデルを使用するために追加
use App\Models\Diary;//Userモデルを使用するために追加

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
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('mypage.mypage',['user_info'=>$user]);
    }

    //マイページにて新規記録の入力
    public function diary(DiaryRequest $request)
    {
        $diary = new Diary;
        $diary->user_id = auth()->id();
        $diary->sleep = $request->sleep;
        $diary->tired = $request->tired;
        $diary->drink = $request->drink;
        $diary->hangover = $request->hangover;
        $diary->memo = $request->memo;
        if ($request->hasFile('photo')) {
            $diary->photo = $request->file('photo')->store('public');
        } else {
            $diary->photo = null;
        }

        $diary->save();
        return redirect()->route('mypage.mypage');
    }
}