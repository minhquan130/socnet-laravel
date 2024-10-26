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