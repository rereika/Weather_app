<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather_app</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

<div class="main">
    <p>どこの天気を調べますか？</p>
    <div class="btn">
        <button class="current-location-btn">
            <img src="{{ asset('image/current-location.png') }}" alt="現在地画像">
        現在地</button>
        <div class="location-input-container">
            <input type="text" class="location-input" placeholder="地名を入力">
            <img src="{{ asset('image/search-icon.png') }}" alt="検索アイコン" class="search-icon">
        </div>
    </div>
</div>

</body>
</html>
