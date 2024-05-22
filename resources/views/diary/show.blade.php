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
    <br>
        <form action="{{ route('diary.delete', ($diary->id) ) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" novalidate>
            @csrf
            @method('DELETE')
            <button type="submit"> 削除 </button>
        </form> 
    <h3><a href="{{ route('diary.index')}}">投稿一覧はこちら</a></h3>
</body>