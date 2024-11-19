<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
</head>
<body>
    <div class="resetPassword-container">
        <h2>Đặt lại mật khẩu</h2>
        <form action="{{ route('password.reset') }}" method="post">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            
            <label>
                Mật khẩu mới
                <input type="password" name="password" required>
            </label>
            
            <label>
                Xác nhận mật khẩu mới
                <input type="password" name="password_confirmation" required>
            </label>
            
            <button type="submit">Đặt lại mật khẩu</button>
        </form>
    </div>
</body>
</html>
