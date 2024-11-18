<!-- resources/views/auth/passwords/reset.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi mật khẩu</title>
</head>

<body>

    <div class="container">
        <h2>Đặt lại mật khẩu</h2>
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Mật khẩu mới:</label>
            <input type="password" name="password" required>
            <label>Nhập lại mật khẩu mới:</label>
            <input type="password" name="password_confirmation" required>
            <button type="submit">Đặt lại mật khẩu</button>
        </form>
    </div>

</body>

</html>