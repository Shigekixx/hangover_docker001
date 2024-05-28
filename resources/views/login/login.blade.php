<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <form action="{{ route('login.login') }}" method="POST">
        @csrf
        <div>
            <label for = "email" >メールアドレス</label>
            <input type="text" id="email" name="email">
        </div>
        <div>
            <label for = "password" >パスワード</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit" > ログイン </button>
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

    <a href="{{ route('users.showregister') }}">会員登録はこちらから</a>

</body>
</html>