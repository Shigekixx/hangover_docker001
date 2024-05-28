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
    <h2>アカウント名：{{ $user->account }}</h2>
    <h1>アカウント名、メールアドレス変更</h1>
    <form action="{{ route('users.accountupdate', $user->id ) }}" method="POST" onsubmit="return confirm('更新しますよ？？');" novalidate>
        @csrf
        @method('PUT')
        <div>
            <label for="diary">ユーザー情報の更新</label>
        </div>
        <div>
            <label for = "account" >アカウント名</label>
            <input type="text" id="account" name="account" value="{{ $user->account }}">
        </div>
        <div>
            <label for = "email" >メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}">
        </div>
        <button type="submit" > 更新 </button>
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