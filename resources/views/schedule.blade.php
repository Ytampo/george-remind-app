@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/schedule-style.css') }}">
@endsection

@section('content')
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
@endsection