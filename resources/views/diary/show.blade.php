<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>アカウント名：{{ $diary->user->account }}</h2>
    <h3>時間：{{ $diary->timestamps }}</h3>
    <p>睡眠：{{ $diary->sleep }}</p>
    <br>
    <p>疲労：{{ $diary->tired }}</p>
    <br>
    <p>飲酒：{{ $diary->drink }}</p>
    <br>
    <p>二日酔い：{{ $diary->hangover }}</p>
    <br>
    @if($diary->memo)
        <p>一言メモ：{{ $diary->memo }}</p>
    @else
        <p>一言メモはありません。</p>
    @endif
    <br>
    @if($diary->photo)
        <p>写真：<img src="{{ Storage::url($diary->photo) }}" alt="Diary Photo"></p>  
    @else
        <p>写真はありません。</p>
    @endif

    @if(Auth::user()->bookmarkdiary->contains($diary->id))
        <form action="{{ route('bookmark.good', $diary->id ) }}" method="POST">
        @csrf
        <button type="submit"> いいね </button>
        </form>
    @else
        <form action="{{ route('bookmark.bad', $bookmark->id ) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"> いいね解除 </button>
    @endif
    <br>
    <a href="{{ route('diary.updatepage', ($diary->id) ) }}">更新ページ</a>
    <form action="{{ route('diary.delete', ($diary->id) ) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" novalidate>
        @csrf
        @method('DELETE')
        <button type="submit"> 削除 </button>
    </form>
    <br>
    <h3>コメント一覧</h3>

    @foreach ($diary->comment as $comment) {{-- CommentControllerのindexメソッド内の「$comments」を受け取る --}}
        <p>コメント：{{ $comment->comment }}</p>
        <br>
        <form action="{{ route('comment.destroy', ($comment->id) ) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" novalidate>
        @csrf
        @method('DELETE')
        <button type="submit"> 削除 </button>
        </form>
    @endforeach 

    <br>
    <form action="{{ route('comment.store', ($diary->id) ) }}" method="POST" onsubmit="return confirm('コメント投稿しますか？');" novalidate>
    @csrf
        <div>
        <label for="diary">コメント投稿</label>
        </div>
        <label for="comment">コメント</label>
        <input type="text" name="comment" id="comment">
        <button type="submit"> 投稿する</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h3><a href="{{ route('diary.index')}}">投稿一覧はこちら</a></h3>
</body>