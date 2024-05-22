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
    <br>
    <form action="{{ route('diary.update', ['id' => $diary->id] ) }}" method="POST" onsubmit="return confirm('本当に更新しますか？');" novalidate>
        @csrf
        @method('PUT')
        <div>
        <label for="diary">記録の更新</label>
        </div>
        <br>
        <div style="display: flex; align-items: center;">
            <span>睡眠：</span>
            <select name="sleep" id="sleep">
                <option value="">-- 選択してください --</option>
                <option value="0" {{ $diary->sleep == 0 ? 'selected' : '' }}>1 全然足りない</option>
                <option value="1" {{ $diary->sleep == 1 ? 'selected' : '' }}>2 もう少し取りたい</option>
                <option value="2" {{ $diary->sleep == 2 ? 'selected' : '' }}>3 最低限取れてる</option>
                <option value="3" {{ $diary->sleep == 3 ? 'selected' : '' }}>4 もう少しで調子良い</option>
                <option value="4" {{ $diary->sleep == 4 ? 'selected' : '' }}>5 絶好調</option>
            </select>
        </div>
        <br>
        <div style="display: flex; align-items: center;">
            <span>疲労：</span>
            <select name="tired" id="tired">
                <option value="">--選択してください--</option>
                <option value="0"{{ $diary->tired == 0 ? 'selected' : '' }}>1 限界</option>
                <option value="1"{{ $diary->tired == 1 ? 'selected' : '' }}>2 かなり疲れている</option>
                <option value="2"{{ $diary->tired == 2 ? 'selected' : '' }}>3 疲れている</option>
                <option value="3"{{ $diary->tired == 3 ? 'selected' : '' }}>4 疲労を感じない</option>
                <option value="4"{{ $diary->tired == 4 ? 'selected' : '' }}>5 絶好調</option>
            </select>
        </div>
        <br>
        <div style="display: flex; align-items: center;">
            <span>飲酒量：</span>
            <select name="drink" id="drink">
                <option value="">--選択してください--</option>
                <option value="0"{{ $diary->drink == 0 ? 'selected' : '' }}>1 飲み過ぎ</option>
                <option value="1"{{ $diary->drink == 1 ? 'selected' : '' }}>2 ちょっとやりすぎ？？</option>
                <option value="2"{{ $diary->drink == 2 ? 'selected' : '' }}>3 気分が良くなっちゃって</option>
                <option value="3"{{ $diary->drink == 3 ? 'selected' : '' }}>4 普通かな</option>
                <option value="4"{{ $diary->drink == 4 ? 'selected' : '' }}>5 少なめ</option>
            </select>
        </div>
        <br>
        <div style="display: flex; align-items: center;">
            <span>二日酔い：</span>
            <select name="hangover" id="hangover">
                <option value="">--選択してください--</option>
                <option value="0"{{ $diary->hangover == 0 ? 'selected' : '' }}>1 正直終わってる</option>
                <option value="1"{{ $diary->hangover == 1 ? 'selected' : '' }}>2 かなりきつい</option>
                <option value="2"{{ $diary->hangover == 2 ? 'selected' : '' }}>3 気持ち悪い</option>
                <option value="3"{{ $diary->hangover == 3 ? 'selected' : '' }}>4 ちょっと頭痛い</option>
                <option value="4"{{ $diary->hangover == 4 ? 'selected' : '' }}>5 健康</option>
            </select>
        </div>
        <br>
        <label for="memo">一言メモ：</label>
        @if($diary->memo)
        <input type="text" name="memo" id="memo" value="{{ $diary->memo }}">
        @else
        <input type="text" name="memo" id="memo" >
        @endif
        <br>
        <label for="photo">写真</label>
        <input type="file" name="photo" id="photo" accept="image/png, image/jpeg">
        @if($diary->photo)
            <img src="{{ Storage::url($diary->photo) }}" alt="Diary Photo"></p>  
        @endif
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