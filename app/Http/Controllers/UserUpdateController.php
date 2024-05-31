<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;//Userモデルを使用するために追加

class UserUpdateController extends Controller
{
    //パスワード更新ページ
    public function userupdatepage($id)
    {
        $user = User::find($id);
        return view('mypage.userupdate',['user'=>$user]);
    }
    
    //パスワード更新機能
    public function userupdate(UserUpdateRequest $request,$id)
    {
        $user = User::find($id);
    
        // パスワードのみ更新する場合は、他のフィールドは更新しない
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->update();
            return redirect()->route('users.mypage');
        }
    }
}
