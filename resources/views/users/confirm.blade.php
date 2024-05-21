<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($users as $user) {{-- PostControllerのindexメソッド内の「$posts」を受け取る --}}
    <h1><a href="{{ route('users.mypage') }}">マイページ</a></h1> {{-- mypage.blade.phpへのリンク --}}
    <br>
    <h1>ID:{{ $user->id }}</h1>
    <h2>氏名:{{ $user->name }}</h2>
    @endforeach 
</body>
</html>