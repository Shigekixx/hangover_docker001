<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>アカウント名：{{ $user->account }}</h2>
    <h1>パスワード変更</h1>
    <form action="{{ route('users.userupdate',($user->id))}}" method="POST" onsubmit="return confirm('更新しますよ？？');" novalidate>
        @csrf
        @method('PUT')
        <div>
            <label for="current_password">現在のパスワード</label>
            <input type="password" id="current_password" name="current_password">
        </div>
        <div>
            <label for="password">新しいパスワード</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="new_password_confirmation">新しいパスワード（確認）</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation">
        </div>
        <button type="submit">更新</button>
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