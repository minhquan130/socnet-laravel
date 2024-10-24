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
        <form action="{{ route('login.store') }}" method="post" class="login-form">
            @csrf
            <label style="cursor: text;">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" id="email" name="email" placeholder="Nhập email" required>
            </label>
            <label style="cursor: text;">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </label>
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