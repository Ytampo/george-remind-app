<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <link rel="icon" href="{{ asset('img/logo-fire.jpg') }}">
        <title>単位危機管理</title>

        <!-- Fonts -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap');
        </style>

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- iPhone ノッチ部分色付け -->
        <div class="notch-bar"></div>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900" id="login-container">
            <div class="login-logo">
                <img src="{{ asset('img/logo-fire-rad.png') }}" alt="logo">
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
