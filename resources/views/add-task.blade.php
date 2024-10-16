@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/add-task-style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('js/add-task.js') }}" defer></script>
@endsection

@section('content')
<h1>課題登録</h1>
<form id="task-form" method="POST">
    @csrf
    <p>課題の名前</p>
    <div class="task-name"><input type="text" name="task-name" placeholder="課題の名前を入力"></div>
    <p>日付</p>
    <div class="date-limit">
        <input type="text" id="datepicker" name="date-limit">
        <!-- flatpickr JS -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            // flatpickrを初期化
            flatpickr("#datepicker", {
                dateFormat: "Y-m-d", // 日付のフォーマットを指定
            });
        </script>
    </div>
    <p>通知する時刻</p>
    <div class="time-limit"><input type="time" name="time-limit" step="300"></div>
    <p>優先順位</p>
    <div class="priority">
        <select name="priority" id="priority">
            <option value="5">★★★★★</option>
            <option value="4">★★★★</option>
            <option value="3">★★★</option>
            <option value="2">★★</option>
            <option value="1">★</option>
            <!-- value設定しないとエラー出る -->
        </select>
    </div>
    <div class="add-btn-div"><button type="submit" id="add-button">追加</button></div>
</form>
@endsection