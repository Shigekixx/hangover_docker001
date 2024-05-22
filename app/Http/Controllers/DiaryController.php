<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;
use App\Http\Requests\DiaryRequest;
use App\Models\User;//Userモデルを使用するために追加
use App\Models\Diary;//Userモデルを使用するために追加

class DiaryController extends Controller
{
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
        return redirect()->route('users.mypage');
    }

    //マイページに記入した内容の一覧
    public function index()
    {
        $diaries = Diary::all();
        return view('diary.index',['diaries'=>$diaries]);
    }

    //投稿詳細画面機能
    public function show($id)
    {
        $diary = Diary::find($id);
        return view('diary.show',['diary'=>$diary]);
    }

    //投稿削除機能
    public function delete($id)
    {   
        $diary = Diary::find($id);
        if ($diary->photo) {
            Storage::disk('public')->delete($diary->photo);
        }
        $diary->delete();
        return redirect()->route('diary.index');
    }

    //投稿削除機能
    public function update(DiaryRequest $request, $id)
    {   
        $diary = Diary::find($id);
        $diary->user_id = auth()->id();
        $diary->sleep = $request->sleep;
        $diary->tired = $request->tired;
        $diary->drink = $request->drink;
        $diary->hangover = $request->hangover;
        $diary->memo = $request->memo;
        if ($request->hasFile('photo')) {
            // 新しい画像がアップロードされた場合
            // 古い画像を削除
            if ($diary->photo) {
                Storage::disk('public')->delete($diary->photo);
            }
            // 新しい画像を保存
            $diary->photo = $request->file('photo')->store('public');
        }
        $diary->save();
        return redirect()->route('diary.show', ['id'=>$id]);
    }

    //編集画面表示機能
    public function updatepage($id)
    {
        $diary = Diary::find($id);
        return view('diary.update',['diary'=>$diary]);
    }
}
