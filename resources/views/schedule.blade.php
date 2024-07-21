<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('img/logo-fire.jpg') }}">
    <title>単位危機管理</title>
    <!-- デバイス表示領域の設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 他ファイルリンク -->
    <link rel="stylesheet" href="{{ asset('css/schedule-style.css') }}">
    <link rel="manifest" href="{{ asset('js/manifest.json') }}">
    <script src="{{ asset('js/no-scroll.js') }}" defer></script>
    <!-- フォント読み込み -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap');
    </style>
</head>

<body>
    <div class="notch-bar"></div> <!-- iPhoneノッチ部分 -->
    <div class="space">
    </div> <!-- 画面上部の余白 -->
    <h1>１限リマインダー</h1>
    <div class="checkbox-grid"> <!-- チェックボックスグリッド -->
        <p>月</p>
        <p>火</p>
        <p>水</p>
        <p>木</p>
        <p>金</p>

        <label><input type="checkbox" class="checkbox" data-index="0"></label>
        <label><input type="checkbox" class="checkbox" data-index="1"></label>
        <label><input type="checkbox" class="checkbox" data-index="2"></label>
        <label><input type="checkbox" class="checkbox" data-index="3"></label>
        <label><input type="checkbox" class="checkbox" data-index="4"></label>

        <label><input type="checkbox" class="checkbox" data-index="5"></label>
        <label><input type="checkbox" class="checkbox" data-index="6"></label>
        <label><input type="checkbox" class="checkbox" data-index="7"></label>
        <label><input type="checkbox" class="checkbox" data-index="8"></label>
        <label><input type="checkbox" class="checkbox" data-index="9"></label>

        <label><input type="checkbox" class="checkbox" data-index="10"></label>
        <label><input type="checkbox" class="checkbox" data-index="11"></label>
        <label><input type="checkbox" class="checkbox" data-index="12"></label>
        <label><input type="checkbox" class="checkbox" data-index="13"></label>
        <label><input type="checkbox" class="checkbox" data-index="14"></label>

        <label><input type="checkbox" class="checkbox" data-index="15"></label>
        <label><input type="checkbox" class="checkbox" data-index="16"></label>
        <label><input type="checkbox" class="checkbox" data-index="17"></label>
        <label><input type="checkbox" class="checkbox" data-index="18"></label>
        <label><input type="checkbox" class="checkbox" data-index="19"></label>

        <label><input type="checkbox" class="checkbox" data-index="20"></label>
        <label><input type="checkbox" class="checkbox" data-index="21"></label>
        <label><input type="checkbox" class="checkbox" data-index="22"></label>
        <label><input type="checkbox" class="checkbox" data-index="23"></label>
        <label><input type="checkbox" class="checkbox" data-index="24"></label>
    </div>
    <div class="save-btn-div"><button id="save-button">保存</button></div>
    <h1>
        開発中です<br>
        実装するまで待っててね
    </h1>
    <div class="foot-space"></div>
    <script src="{{ asset('js/schedule.js') }}"></script>
    <footer> <!-- 画面下部タブバー -->
        <div class="footer-item">
            <a href="{{ route('add-task') }}"><img class="footer-logo" src="{{ asset('img/reg-assignment-logo.png') }}"></a>
        </div>
        <div class="footer-item">
            <a href="{{ route('dashboard') }}"><img class="footer-logo" src="{{ asset('img/home-logo.png') }}"></a>
        </div>
        <div class="footer-item">
            <a href="{{ route('schedule') }}"><img class="footer-logo" src="{{ asset('img/time-logo.png') }}"></a>
        </div>
    </footer>
    <div id="app">
    </div>
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
