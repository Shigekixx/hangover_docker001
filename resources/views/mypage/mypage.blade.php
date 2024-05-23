<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>アカウント:{{ $user->account }}</p>
    <form action="{{ route('users.userdelete', ($user->id) ) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" novalidate>
        @csrf
        @method('DELETE')
        <button type="submit"> 削除 </button>
    </form>
    <br>
    <a href="{{ route('users.accountupdatepage', ($user->id) ) }}">アカウント名変更はこちらから</a>
    <br>
    <a href="{{ route('users.userupdatepage', ($user->id) ) }}">メールアドレス・パスワード変更はこちらから</a>
    <br>
    <form action ="{{route('diary.diary')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
        <label for="diary">本日の記録</label>
        </div>
        <br>
        <div style="display: flex; align-items: center;">
            <span>睡眠：</span>
            <select name="sleep" id="sleep">
                <option value="">-- 選択してください --</option>
                <option value="0">1 全然足りない</option>
                <option value="1">2 もう少し取りたい</option>
                <option value="2">3 最低限取れてる</option>
                <option value="3">4 もう少しで調子良い</option>
                <option value="4">5 絶好調</option>
            </select>
        </div>
        <br>
        <div style="display: flex; align-items: center;">
            <span>疲労：</span>
            <select name="tired" id="tired">
                <option value="">--選択してください--</option>
                <option value="0">1 限界</option>
                <option value="1">2 かなり疲れている</option>
                <option value="2">3 疲れている</option>
                <option value="3">4 疲労を感じない</option>
                <option value="4">5 絶好調</option>
            </select>
        </div>
        <br>
        <div style="display: flex; align-items: center;">
            <span>飲酒量：</span>
            <select name="drink" id="drink">
                <option value="">--選択してください--</option>
                <option value="0">1 飲み過ぎ</option>
                <option value="1">2 ちょっとやりすぎ？？</option>
                <option value="2">3 気分が良くなっちゃって</option>
                <option value="3">4 普通かな</option>
                <option value="4">5 少なめ</option>
            </select>
        </div>
        <br>
        <div style="display: flex; align-items: center;">
            <span>二日酔い：</span>
            <select name="hangover" id="hangover">
                <option value="">--選択してください--</option>
                <option value="0">1 正直終わってる</option>
                <option value="1">2 かなりきつい</option>
                <option value="2">3 気持ち悪い</option>
                <option value="3">4 ちょっと頭痛い</option>
                <option value="4">5 健康</option>
            </select>
        </div>
        <br>
        <label for="memo">一言メモ</label>
        <input type="text" name="memo" id="memo">
        <br>
        <label for="photo">写真</label>
        <input type="file" name="photo" id="photo" accept="image/png, image/jpeg">
        <button type="submit" > 記録 </button>
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
    <br>
    <form action ="{{route('login.logout')}}" method="POST">
        @csrf
        <button type="submit"> ログアウト </button>
    </form>

    <!-- 自分の投稿が一覧表示 -->
    @foreach ($user->diary as $diary)
        <h3>時間：{{ $diary->timestamps }}</h3>
        <p>睡眠：{{ $diary->sleep }}</p>
        <br>
        <p>疲労：{{ $diary->tired }}</p>
        <br>
        <p>飲酒：{{ $diary->drink }}</p>
        <br>
        <p>二日酔い：{{ $diary->hangover }}</p>
        <br>
    @endforeach 

    <h3><a href="{{ route('diary.index')}}">投稿一覧はこちら</a></h3>
</body>
</html>