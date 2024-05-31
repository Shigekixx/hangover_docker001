<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    //ブックマーク登録機能
    public function good($diaryId)
    {
        $diary = Diary::find($diaryId);
        Auth::user()->bookmarkdiary()->syncWithoutDetaching([$diary->id]);

        return redirect()->back(); 
    }

    //ブックマーク削除機能
    public function bad($diaryId)
    {
        Auth::user()->bookmarkdiary()->detach($diaryId);

        return redirect()->back(); 
    }

}
