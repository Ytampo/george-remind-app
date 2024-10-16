@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/my-tasks-style.css') }}">
@endsection

@section('content')
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
@endsection