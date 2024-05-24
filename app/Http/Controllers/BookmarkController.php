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
        Auth::user()->bookmarkdiary()->attach($diary);

        return redirect()->back(); 
    }

    public function bad($diaryId)
    {
        $diary = Diary::find($diaryId);
        Auth::user()->bookmarkdiary()->detach($diary);

        return redirect()->back(); 
    }

}
