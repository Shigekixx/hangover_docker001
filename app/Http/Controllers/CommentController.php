<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    //コメント登録機能
    public function store(CommentRequest $request,$id)
    {
        $comment = new Comment;
        $comment->user_id = auth()->id();
        $comment->diary_id = $id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back(); 
    }

    //投稿削除機能
    public function destroy($id)
    {   
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
