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
    <form action="{{ route('diary.update', ['id' => $diary->id] ) }}" method="POST" onsubmit="return confirm('本当に更新しますか？');" novalidate>
        @csrf
        @method('PUT')
        <div>
        <label for="diary">記録の更新</label>
        </div>
        <br>
        <select name="sleep" id="sleep">
            <option value="">--睡眠--</option>
            <option value="0">1 全然足りない</option>
            <option value="1">2 もう少し取りたい</option>
            <option value="2">3 最低限取れてる</option>
            <option value="3">4 もう少しで調子良い</option>
            <option value="4">5 絶好調</option>
        </select>
        <br>
        <select name="tired" id="tired">
            <option value="">--疲労--</option>
            <option value="0">1 限界</option>
            <option value="1">2 かなり疲れている</option>
            <option value="2">3 疲れている</option>
            <option value="3">4 疲労を感じない</option>
            <option value="4">5 絶好調</option>
        </select>
        <br>
        <select name="drink" id="drink">
            <option value="">--飲酒量--</option>
            <option value="0">1 飲み過ぎ</option>
            <option value="1">2 ちょっとやりすぎ？？</option>
            <option value="2">3 気分が良くなっちゃって</option>
            <option value="3">4 普通かな</option>
            <option value="4">5 少なめ</option>
        </select>
        <br>
        <select name="hangover" id="hangover">
            <option value="">--二日酔い--</option>
            <option value="0">1 正直終わってる</option>
            <option value="1">2 かなりきつい</option>
            <option value="2">3 気持ち悪い</option>
            <option value="3">4 ちょっと頭痛い</option>
            <option value="4">5 健康</option>
        </select>
        <br>
        <label for="memo">一言メモ</label>
        <input type="text" name="memo" id="memo">
        <br>
        <label for="photo">写真</label>
        <input type="file" name="photo" id="photo" accept="image/png, image/jpeg">
        <button type="submit">更新 </button>
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