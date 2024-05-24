<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>投稿一覧</h1>
    @foreach ($diaries as $diary) 
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
        @if(Auth::user()->bookmarkdiary->contains($diary->id))
            <form action="{{ route('bookmark.bad', $diary->id ) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"> いいね解除 </button>
        @else
            <form action="{{ route('bookmark.good', $diary->id ) }}" method="POST">
            @csrf
            <button type="submit"> いいね </button>
            </form>
        @endif
        <h3><a href="{{ route('diary.show', $diary->id) }}">投稿詳細はこちら</a></h3> {{-- show.blade.phpへのリンク --}}
    @endforeach 

    <h3><a href="{{ route('users.mypage')}}">マイページはこちら</a></h3>

</body>