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
        @endif
        <br>
        @if($diary->photo)
        <p>写真：<img src="{{ Storage::url($diary->photo) }}" alt="Diary Photo"></p>  
        @endif
        <!-- 写真が空欄の時の処理 !!!!!-->
    @endforeach 

    <h3><a href="{{ route('users.mypage')}}">マイページはこちら</a></h3>

</body>