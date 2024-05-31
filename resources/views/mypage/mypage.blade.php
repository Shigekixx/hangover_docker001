<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/stylemypage.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>

<body>
    <main>
        <div class="mypagetitle">
            <h1>{{ $user->account }}のマイページ</h1>
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

        <a href="https://codepen.io/tonkec/" class="ua" target="_blank">
            <i class="fa fa-user"></i>
        </a>

        <div class="diaryregister">
            <form action ="{{route('diary.diary')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="diary_title">
                <h1>本日の記録</h1>
                </div>
                <br>
                <div class="mypagediary">
                    <div style="display: flex; align-items: center;">
                        <span>睡眠：</span>
                        <select name="sleep" id="sleep">
                            <option value="">-- 選択してください --</option>
                            <option value="1">1 全然足りない</option>
                            <option value="2">2 もう少し取りたい</option>
                            <option value="3">3 最低限取れてる</option>
                            <option value="4">4 もう少しで調子良い</option>
                            <option value="5">5 絶好調</option>
                        </select>
                    </div>
                    <br>
                    <div style="display: flex; align-items: center;">
                        <span>疲労：</span>
                        <select name="tired" id="tired">
                            <option value="">--選択してください--</option>
                            <option value="1">1 限界</option>
                            <option value="2">2 かなり疲れている</option>
                            <option value="3">3 疲れている</option>
                            <option value="4">4 疲労を感じない</option>
                            <option value="5">5 絶好調</option>
                        </select>
                    </div>
                    <br>
                    <div style="display: flex; align-items: center;">
                        <span>飲酒量：</span>
                        <select name="drink" id="drink">
                            <option value="">--選択してください--</option>
                            <option value="1">1 飲み過ぎ</option>
                            <option value="2">2 ちょっとやりすぎ？？</option>
                            <option value="3">3 気分が良くなっちゃって</option>
                            <option value="4">4 普通かな</option>
                            <option value="5">5 少なめ</option>
                        </select>
                    </div>
                    <br>
                    <div style="display: flex; align-items: center;">
                        <span>二日酔い：</span>
                        <select name="hangover" id="hangover">
                            <option value="">--選択してください--</option>
                            <option value="1">1 正直終わってる</option>
                            <option value="2">2 かなりきつい</option>
                            <option value="3">3 気持ち悪い</option>
                            <option value="4">4 ちょっと頭痛い</option>
                            <option value="5">5 健康</option>
                        </select>
                    </div>
                    <br>
                    <label for="memo">一言メモ</label>
                    <input type="text" name="memo" id="memo">
                    <br>
                    <label for="photo">写真</label>
                    <input type="file" name="photo" id="photo" accept="image/png, image/jpeg">
                </div>
                <br>
                
                <button type="submit" > 記録 </button>
            </form>
        </div>

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
        <div class="myindex">
        <!-- 自分の投稿が一覧表示 -->
            <div class="myrecord">
            <h1>今までの記録</h1>
                @foreach ($user->diary as $diary)
                    <h3>時間：{{ $diary->created_at }}</h3>
                    <ul class="diary">
                        <li>睡眠：{{ $diary->sleep }}</li>
                        <br>
                        <li>疲労：{{ $diary->tired }}</li>
                        <br>
                        <li>飲酒：{{ $diary->drink }}</li>
                        <br>
                        <li>二日酔い：{{ $diary->hangover }}</li>
                        <br>
                    </ul>
                @endforeach 
            </div>
            <div class="mybookmark">
                <h1>お気に入り投稿一覧</h1>
                @foreach ($user->bookmarkdiary as $bookmarkdiary)
                    <h3>アカウント名：{{ $bookmarkdiary->user->account }},時間：{{ $bookmarkdiary->created_at }}</h3>
                    <ul class="diary">
                        <li>睡眠：{{ $bookmarkdiary->sleep }}</li>
                        <br>
                        <li>疲労：{{ $bookmarkdiary->tired }}</li>
                        <br>
                        <li>飲酒：{{  $bookmarkdiary->drink }}</li>
                        <br>
                        <li>二日酔い：{{ $bookmarkdiary->hangover }}</li>
                        <br>
                    </ul>
                @endforeach 
            </div>
        </div>

        <canvas id="myLineChart"></canvas>
        <!-- Chart.jsのスクリプトを読み込む -->

        <script>
            var diaryData = {!! $user->diary->toJson() !!};
        </script>

        <!-- 外部JavaScriptファイルを読み込む -->
        <script src="{{ asset('js/script03.js') }}"></script>
        
        <div class="logoutbutton">
            <form action ="{{route('login.logout')}}" method="POST">
                @csrf
                <button type="submit"> ログアウト </button>
            </form>
        </div>

    </main>

    <div class="sidebar">
        <ul class="sidebar-list">
            <li class="sidebar-item"><a href="{{ route('users.accountupdatepage', ($user->id) ) }}" class="sidebar-anchor">アカウント名・メールアドレス変更</a></li>
            <li class="sidebar-item"><a href="{{ route('users.userupdatepage', ($user->id) ) }}" class="sidebar-anchor">パスワード変更</a></li>
            <li class="sidebar-item"><a href="{{ route('diary.index') }}" class="sidebar-anchor">投稿一覧</a></li>
            <li class="sidebar-item"><a href="{{ route('users.deletepage',($user->id) ) }}" class="sidebar-anchor">アカウント削除</a></li>
        </ul>
    </div>

</body>
</html>