<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather_app</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

<header>
    <h1>Weather App</h1>
</header>

<div class="container">

    <div class="main">
        <p>どこの天気を調べますか？</p>

        <div class="btn">
            <button class="current-location-btn" id="current-location-btn">
                <img src="{{ asset('image/current-location.png') }}" alt="現在地画像">
            現在地
            </button>

            <form action="{{ route('name.check.weather') }}" method="GET">
                <div class="location-input-container">
                    <input type="text" name="city" class="location-input" placeholder="地名を入力" required>
                    <img src="{{ asset('image/search-icon.png') }}" alt="検索アイコン" class="search-icon">
                </div>
            </form>

            <!-- <div class="txt-margin">
                <p>緯度：<span id="latitude">???</span><span>度</span></p>
                <p>経度：<span id="longitude">???</span><span>度</span></p>
            </div> -->

            @if($weatherData)
            <p>気温：{{ $weatherData['main']['temp'] }}°C</p>
            @else
                <p>天気情報が取得できませんでした。</p>
            @endif

        </div>

    </div>

</div>

<script src="{{ asset('js/home.js') }}"></script>

</body>
</html>
