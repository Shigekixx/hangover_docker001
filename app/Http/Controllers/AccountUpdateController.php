<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;//Userモデルを使用するために追加


class AccountUpdateController extends Controller
{
    public function accountupdatepage($id)
    {
        $user = User::find($id);
        return view('mypage.accountupdate',['user'=>$user]);
    }
    
    public function accountupdate(Request $request,$id)
    {
        $user = User::find($id);

        $validatedData = $request->validate([
            'account' => 'required|unique:users,account,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedData);
        return redirect()->route('users.mypage');
    }
}

