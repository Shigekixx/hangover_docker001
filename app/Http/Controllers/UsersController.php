<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;//Commentモデルを使用するために追加

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index'); // views/posts/index.blade.php を表示する
    }
    public function register(RegisterRequest $request)
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