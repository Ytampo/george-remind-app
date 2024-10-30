<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('img/logo-fire.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/logo-fire-512.png') }}">
    <title>単位危機管理</title>
    
    <!-- Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap');
    </style>

    <!-- Styles -->
    @yield('css')

    <!-- Scripts -->
    <link rel="manifest" href="{{ asset('js/manifest.json') }}">
    <script src="{{ asset('js/no-scroll.js') }}" defer></script>
    @yield('js')
    
</head>
<body>
    <!-- iPhone ノッチ部分色付け -->
    <div class="notch-bar"></div>
    <!-- 画面上部余白 -->
    <div class="space">
        @yield('top-space')
    </div>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <div class="foot-space"></div>

    <!-- 画面下部タブバー -->
    <footer>
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

    <!-- Service Worker -->
    {{-- <script>
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
    </script> --}}
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('js/pushcode_sw.js')
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
