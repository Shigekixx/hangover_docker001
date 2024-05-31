<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style01.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>
    <h1>HANGOVER</h1>
    <div class="gradient">
        <h3><a id="ageLink" href="#">20歳未満</a></h3>
        <h3><a href="{{ route('login.showlogin') }}">20歳以上</a></h3>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script>
        var imageUrl = "{{ asset('images/IMG_1999.PNG') }}";
    </script>

</body>
</html>
