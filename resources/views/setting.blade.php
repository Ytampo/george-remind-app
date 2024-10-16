@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/setting-style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('js/add-task.js') }}" defer></script>
@endsection

@section('content')
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
@endsection