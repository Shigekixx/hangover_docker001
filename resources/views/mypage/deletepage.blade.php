<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style02.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styledelete.css') }}">
</head>

<body>
    <div class="confirm_alart">
        <h1> アカウント削除ページ</h1>
    </div>
    <form action="{{ route('users.userdelete', ($user->id) ) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" novalidate>
        @csrf
        @method('DELETE')
        <button type="submit"> アカウント削除 </button>
    </form>
    <br>
    <div class="cancel">
        <a href="{{ route('users.mypage', ($user->id))}}" >キャンセル</a>
    </div>
</body>