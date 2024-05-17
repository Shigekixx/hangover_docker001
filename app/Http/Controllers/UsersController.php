<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;//Userモデルを使用するために追加

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index'); // views/users/index.blade.php を表示する
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
        return redirect()->route('users.index');
    }

}