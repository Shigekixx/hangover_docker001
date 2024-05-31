<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style02.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleregister.css') }}">
</head>

<body>
    <div class="container">
        <div class="size_hangover">
            <h1>ユーザー登録</h1>
        </div>
        <br>
        <form action="{{ route('users.register') }}" method="POST" onsubmit="return confirm('登録内容を今一度ご確認ください');" novalidate>
            @csrf
            <div>
                <label for="name">氏名</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="account">アカウント名</label>
                <input type="text" id="account" name="account">
            </div>
            <div>
                <label for="email">メールアドレス</label>
                <input type="text" id="email" name="email">
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit">登録</button>
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
    </div>

</body>
</html>
