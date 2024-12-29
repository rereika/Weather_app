<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Weather</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/load.css') }}">
</head>
<body>

{{-- ロード画面 --}}
<div id="page_loading" style="display:none;">
<div id="load_area">
<div class="loader">Loading...</div>
<div id="page_loading_text"></div>
</div>
</div>


<header>
    <h1>Quick Weather</h1><img src="{{ asset('image/header_image.png') }}" alt="ヘッダー画像">
</header>

<div class="container">

    <div class="weather-search">

        <p>どこの天気を調べますか？</p>

        <div class="btn">
            <button class="current-location-btn" id="current-location-btn">
                <img src="{{ asset('image/current-location.png') }}" alt="現在地画像">
            現在地
            </button>

            <form action="{{ route('name.check.weather') }}" method="GET">
                <div class="location-input-container">
                    <input type="text" name="city" class="location-input" placeholder="地名を入力" required>
                    <button type="submit" class="search-button">
                        <img src="{{ asset('image/search-icon.png') }}" alt="検索アイコン" class="search-icon">
                    </button>
                </div>
            </form>
        </div>

    </div>

    <div class="weather-display">

        <div class="txt-margin">
            <p>緯度：<span id="latitude">???</span><span>度</span></p>
            <p>経度：<span id="longitude">???</span><span>度</span></p>
        </div>

    </div>

</div>

<script src="{{ asset('js/home.js') }}"></script>

<!--==============ロード画面のJQuery読み込み===============-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
<!--IE11用※対応しなければ削除してください-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
<!--自作のJS-->
<script src="js/load.js"></script>
<!--==============END ロード画面のJQuery読み込み===============-->

</body>
</html>
