<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instacon</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery (nếu cần cho phần khác của trang) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap Bundle (bao gồm Popper.js cho modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script src="{{ asset('js/all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{ asset('css/friend.css')}}">
    <link rel="stylesheet" href="{{ asset('css/chat.css')}}">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header_container">
            <!-- Logo -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="" height="54">
                </a>
            </div>
            <div class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Tìm kiếm...">
            </div>
            <!-- Mavigation -->
            <div class="navigation">
                <a href="{{ route('home') }}" class="home active">
                    <span><i class="fa-solid fa-house"></i></span>
                </a>
                <a href="{{ route('friends') }}" class="friends">
                    <span><i class="fa-solid fa-user-group"></i></span>
                </a>
                <a href="{{ route('chats') }}" class="messages">
                    <span><i class="fa-solid fa-comments"></i></span>
                </a>
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
                        <img src="{{ $userCurrent->profile_pic_url == null ? asset('images/none-avatar.jpg') :  $userCurrent->profile_pic_url }}" alt="">
                        <i class="fa-solid fa-circle-chevron-down icon-dropdonw"></i>
                    </div>
                </a>
            </div>
        </div>

    </header>
</body>