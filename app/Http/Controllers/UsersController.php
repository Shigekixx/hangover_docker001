<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
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

    //ユーザー情報を登録機能
    public function register(UserRequest $request)
    {
        $user = new User; //Usersテーブルに新しく入力されたデータを取得
        $user->name = $request->name;
        $user->account = $request->account;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        Auth::login($user);
        return redirect()->route('users.mypage');
    }

    //マイページを表示
    public function mypage()
    {   
        $id = Auth::id();
        $user = User::with('diary')->find($id);
        return view('mypage.mypage',['user'=>$user]);
    }

    //ユーザー登録画面
    public function deletepage($id)
    {
        $user = User::find($id);
        return view('mypage.deletepage',['user'=>$user]); // views/users/index.blade.php を表示する
    }

    //ユーザー削除機能
    public function userdelete()
    {
        $id = Auth::id();
        $user = User::find($id);
        $user->delete();
        return redirect()->route('login.showlogin');
    }

    //アカウント情報更新ページ
    public function accountupdatepage($id)
    {
        $user = User::find($id);
        return view('mypage.accountupdate',['user'=>$user]);
    }
    
    //アカウント情報更新機能
    public function accountupdate(UserUpdateRequest $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->account = $request->account;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        Auth::login($user);
        return redirect()->route('users.mypage');
    }
}
