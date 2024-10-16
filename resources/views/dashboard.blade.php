@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard-style.css') }}">
@endsection

@section('top-space')
<div class="setting" style="float: right;">
    <a href="{{ route('setting') }}"><img class="setting-logo" src="{{ asset('img/setting.svg') }}"></a>
</div>
@endsection

@section('content')
<div class="menu-bar">
    <div class="menu-item"><a class="menu-btn" href="{{ route('add-task') }}">課題<br>登録</a></div>
    <div class="menu-item"><a class="menu-btn" href="{{ route('schedule') }}">時間割<br>カレンダー</a></div>
    <div class="menu-item"><a class="menu-btn" href="{{ route('my-tasks') }}">課題<br>リスト</a></div>
</div>
<div class="content">
    <img src="{{ asset('img/straight-face-man.jpg') }}" alt="">
    課題できないやつ、弱いって。厳しいって。
</div>
@endsection