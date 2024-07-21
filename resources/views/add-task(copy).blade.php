<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('img/logo-fire.jpg') }}">
    <title>単位危機管理アプリ</title>
    <!-- デバイス表示領域の設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 他ファイルリンク -->
    <link rel="stylesheet" href="{{ asset('css/add-task-style.css') }}">
    <link rel="manifest" href="{{ asset('js/manifest.json') }}">
    <script src="{{ asset('js/no-scroll.js') }}" defer></script>
    <!-- フォント読み込み -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap');
    </style>
</head>

<body>
    <div class="notch-bar"></div> <!-- iPhoneノッチ部分 -->
    <div class="space"></div> <!-- 画面上部の余白 -->
    <h1>課題登録</h1>
    <div class="reg-task">
        <p>課題の名前</p>
        <div class="task-name"><input type="text" name="task-name" placeholder="課題の名前を入力"></div>
        <p>日付</p>
        <div class="date-limit">
            <input type="text" id="datepicker">
            <!-- flatpickr JS -->
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                // flatpickrを初期化
                flatpickr("#datepicker", {
                    dateFormat: "Y-m-d", // 日付のフォーマットを指定
                });
            </script>
        </div>
        <p>時刻</p>
        <div class="time-limit"><input type="time" name="task-time" step="300"></div>
        <p>優先順位</p>
        <div class="rating">
            <select name="rating" id="rating">
                <option>★★★★★</option>
                <option>★★★★</option>
                <option>★★★</option>
                <option>★★</option>
                <option>★</option>
            </select>
        </div>
        <div class="add-btn-div"><button id="add-button">追加</button></div>
    </div>
    <div class="foot-space"></div>
    <footer> <!-- 画面下部タブバー -->
        <div class="footer-item">
            <a href="{{ route('add-task') }}"><img class="footer-logo"
                    src="{{ asset('img/reg-assignment-logo.png') }}"></a>
        </div>
        <div class="footer-item">
            <a href="{{ route('dashboard') }}"><img class="footer-logo" src="{{ asset('img/home-logo.png') }}"></a>
        </div>
        <div class="footer-item">
            <a href="{{ route('schedule') }}"><img class="footer-logo" src="{{ asset('img/time-logo.png') }}"></a>
        </div>
    </footer>
    <link rel="script" href="{{ asset('add-task.js') }}">
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
