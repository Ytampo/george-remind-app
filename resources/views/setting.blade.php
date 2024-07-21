<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="img/logo-fire.jpg">
    <title>単位危機管理</title>
    <!-- デバイス表示領域の設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 他ファイルリンク -->
    <link rel="stylesheet" href="{{ asset('css/setting-style.css') }}">
    <link rel="manifest" href="manifest.json">
    <link rel="script" href="no-scroll.js">
    <!-- フォント読み込み -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap');
    </style>
</head>

<body>
    <div class="notch-bar"></div> <!-- iPhoneノッチ部分 -->
    <div class="space"></div> <!-- 画面上部の余白 -->
    <div class="content">
        <div class="message">
            <img src="{{ asset('img/straight-face-man.jpg') }}" alt="">
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
        <div class="home-back">
            <a href="{{ route('dashboard') }}"><img src="{{ asset('img/home-back.png') }}" alt=""></a>
        </div>
    </div>
    <div class="foot-space"></div>
    <footer> <!-- 画面下部タブバー -->
        <div class="footer-item">
            <a href="{{ route('add-task') }}">
                <img class="footer-logo" src="{{ asset('img/reg-assignment-logo.png') }}">
            </a>
        </div>
        <div class="footer-item">
            <a href="{{ route('dashboard') }}"><img class="footer-logo" src="{{ asset('img/home-logo.png') }}"></a>
        </div>
        <div class="footer-item">
            <a href="{{ route('schedule') }}"><img class="footer-logo" src="{{ asset('img/time-logo.png') }}"></a>
        </div>
    </footer>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/js/service-worker.js')
                    .then(function(registration) {
                        console.log('ServiceWorker registration successful with scope: ', registration.scope);
                    }, function(err) {
                        console.log('ServiceWorker registration failed: ', err);
                    });
            });
        }
    </script>
</body>

</html>
