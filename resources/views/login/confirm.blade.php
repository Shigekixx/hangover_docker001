<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style01.css') }}">
</head>

<body>
<h1>HANGOVER</h1>
<div class="gradient">
    <h3><a id="ageLink" href="#">20歳未満</a></h3>
    <h3><a href="{{ route('login.showlogin') }}">20歳以上</a></h3>
</div>
<div id="imageContainer" style="display: none;">
    <img id="displayedImage" src="" alt="Image">
</div>

<script src="{{ asset('js/script.js') }}"></script>
<script>
    var imageUrl = "{{ asset('storage/app/public/IMG_1143.PNG') }}";
</script>
</body>
</html>