<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('img/logo-fire.jpg') }}">
    <title>単位危機管理</title>
    <!-- デバイス表示領域の設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 他ファイルリンク -->
    <link rel="stylesheet" href="{{ asset('css/my-tasks-style.css') }}">
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
    <div class="menu-bar">
        <div class="menu-item"><a class="menu-btn" href="{{ route('add-task') }}">課題<br>登録</a></div>
        <div class="menu-item"><a class="menu-btn" href="{{ route('schedule') }}">時間割<br>カレンダー</a></div>
        <div class="menu-item"><a class="menu-btn" href="{{ route('my-tasks') }}">課題<br>リスト</a></div>
    </div>
    <div class="content">
        <h1>課題一覧</h1>
        @if ($tasks->isEmpty())
            <div class="no-tasks">
                <img src="{{ asset('img/straight-face-man.jpg') }}" alt="">
                <p>課題がありません</p>
                <p>「課題登録」から追加しましょう！</p>
            </div>
        @else
            <ul>
                @foreach ($tasks as $task)
                    <li>
                        <p>{{ $task->task_name }}</p>
                        {{ $task->date_limit }} {{ $task->time_limit }} 優先度：{{ $task->priority }}
                        <!-- 削除ボタン -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('本当にこの課題を削除しますか？')">削除</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
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
