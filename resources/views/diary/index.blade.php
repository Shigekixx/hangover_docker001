<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style02.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style04.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleindex.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/scriptside.js') }}"></script>
</head>

<body>
    <main>
        <div class="indextitle">
            <h1>投稿一覧</h1>
        </div>

        <div class="nav-right visible-xs">
            <div class="button" id="btn">
                <div class="bar top"></div>
                <div class="bar middle"></div>
                <div class="bar bottom"></div>
            </div>
        </div>
        <!-- nav-right -->

        <nav>
            <div class="nav-right hidden-xs">
                <div class="button" id="btn">
                    <div class="bar top"></div>
                    <div class="bar middle"></div>
                    <div class="bar bottom"></div>
                </div>
            </div>
        </nav>

        @foreach ($diaries as $diary) 
        <div class="diaryindex">
            <a href="{{ route('diary.show', $diary->id) }}">
                <h2>アカウント名：{{ $diary->user->account }},{{ $diary->created_at }}</h2>
                <br>
                <ul class="diary">
                    <li>睡眠：{{ $diary->sleep }}</li>
                    <br>
                    <li>疲労：{{ $diary->tired }}</li>
                    <br>
                    <li>飲酒：{{ $diary->drink }}</li>
                    <br>
                    <li>二日酔い：{{ $diary->hangover }}</li>
                    <br>
                    @if($diary->memo)
                        <li>一言メモ：{{ $diary->memo }}</li>
                    @else
                        <li>一言メモはありません。</li>
                    @endif
                </ul>
            </a>
        </div>
            <br>
            <div class="goodbutton">
                @if(Auth::user()->bookmarkdiary && Auth::user()->bookmarkdiary->contains($diary->id))
                    <form action="{{ route('bookmark.bad', $diary->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"> いいね解除 </button>
                    </form>
                @else
                    <form action="{{ route('bookmark.good', $diary->id ) }}" method="POST">
                        @csrf
                        <button type="submit"> いいね </button>
                    </form>
                @endif
            </div>

        @endforeach 

        <h3><a href="{{ route('users.mypage')}}">マイページはこちら</a></h3>
    </main>

    <div class="sidebar">
        <ul class="sidebar-list">
            <li class="sidebar-item"><a href="{{ route('users.accountupdatepage', ($diary->user->id) ) }}" class="sidebar-anchor">アカウント名・メールアドレス変更</a></li>
            <li class="sidebar-item"><a href="{{ route('users.userupdatepage', ($diary->user->id) ) }}" class="sidebar-anchor">パスワード変更</a></li>
            <li class="sidebar-item"><a href="{{ route('users.mypage') }}" class="sidebar-anchor">マイページ</a></li>
            <li class="sidebar-item"><a href="{{ route('users.deletepage',($diary->user->id) ) }}" class="sidebar-anchor">アカウント削除</a></li>
        </ul>
    </div>

</body>