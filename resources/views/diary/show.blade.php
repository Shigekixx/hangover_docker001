<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style02.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style04.css') }}">
</head>
<body>
    <h2>アカウント名：{{ $diary->user->account }},{{ $diary->created_at }}</h2>
    <ul class="diary">
        <li><p>睡眠：{{ $diary->sleep }}</p></li>
        <br>
        <li><p>疲労：{{ $diary->tired }}</p></li>
        <br>
        <li><p>飲酒：{{ $diary->drink }}</p></li>
        <br>
        <li><p>二日酔い：{{ $diary->hangover }}</p></li>
        <br>
        @if($diary->memo)
            <li><p>一言メモ：{{ $diary->memo }}</p></li>
        @else
            <li><p>一言メモはありません。</p></li>
        @endif
        <br>
        @if($diary->photo)
            <li><p>写真：<img src="{{ Storage::url($diary->photo) }}" alt="Diary Photo"></p></li>  
        @else
            <li><p>写真はありません。</p></li>
        @endif
    </ul>

    @if(Auth::user()->bookmarkdiary && Auth::user()->bookmarkdiary->contains($diary->id))
        <form action="{{ route('bookmark.bad', $diary->id ) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"> いいね解除 </button>
        </form>
    @else
        <form action="{{ route('bookmark.good', $diary->id ) }}" method="POST">
            @csrf
            <button type="submit"> いいね </button>
        </form>
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
        <li><p>コメント：{{ $comment->comment }}</p></li>
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

    <p>Illustration by <a href="https://icons8.com/illustrations/author/zD2oqC8lLBBA">Icons 8</a> from <a href="https://icons8.com/illustrations">Ouch!</a></p>
</body>