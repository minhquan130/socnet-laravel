<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>

        <!-- Hiển thị thông báo nếu có -->
        @if(session('status'))
        <div id="notification" class="alert alert-success">
            {{ session('status') }}
        </div>
        <script>
        // Hiển thị hộp thông báo và chuyển hướng sau 3 giây
        setTimeout(function() {
            // Ẩn thông báo sau 3 giây
            document.getElementById('notification').style.display = 'none';
            // Chuyển hướng đến trang login
            window.location.href = '{{ url("login") }}'; // Hoặc dùng route
        }, 1000); // Thời gian delay là 3000ms (3 giây)
        </script>
        @endif


        <form action="{{ route('login.store') }}" method="post" class="login-form">
            @csrf
            <label style="cursor: text;">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" id="email" name="email" placeholder="Nhập email">
            </label>
            @if ($errors->any())
                {{ $errors->first('email') }}
            @endif
            <label style="cursor: text;">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
            </label>
            @if ($errors->any())
                {{ $errors->first('password') }}
            @endif
            <label style="background: none; padding: 0;">
                <input type="checkbox" name="" id="" style="width: fit-content; cursor: pointer;">
                Nhớ lần đăng nhập.
            </label>
            <label class="btn-submit">
                <input type="submit" value="Đăng nhập">
            </label>
        </form>
        <div>
            <div class=""><a href="{{ route('register') }}">Đăng ký</a></div>
            <div class="forgot-password"><a href="{{ route('forgetpassword') }}">Bạn quên mật khẩu?</a></div>
        </div>
    </div>
</body>

</html>