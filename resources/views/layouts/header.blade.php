<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instacon</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script src="{{ asset('js/all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css')}}">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header_container">
            <!-- Logo -->
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="" height="54">
            </div>
            <div class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Tìm kiếm...">
            </div>
            <!-- Mavigation -->
            <div class="navigation">
                <div class="home active">
                    <span><i class="fa-solid fa-house"></i></span>
                </div>
                <div class="friends">
                    <span><i class="fa-solid fa-user-group"></i></span>
                </div>
                <div class="messages">
                    <span><i class="fa-solid fa-comments"></i></span>
                </div>
                <div class="messages">
                    <span><i class="fa-solid fa-camera-retro"></i></span>
                </div>
            </div>
            <!-- Header Left -->
            <div class="header_left">
                <div class="notification">
                    <i class="fa-solid fa-bell icon-notification"></i>
                </div>
                <a href="{{route('logout')}}">
                    <div class="setting">
                        <i class="fa-solid fa-circle-chevron-down icon-dropdonw"></i>
                    </div>
                </a>
            </div>
        </div>

    </header>
</body>