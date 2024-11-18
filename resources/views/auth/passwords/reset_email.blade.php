<!-- resources/views/auth/passwords/reset_email.blade.php -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy lại mật khẩu</title>
 </head>
 <body>
    <p>Bạn đã yêu cầu đặt lại mật khẩu cho tài khoản của mình. Nhấn vào link dưới đây để đặt lại mật khẩu:</p>
<a href="{{ url('password/reset/' . $token) }}">Đặt lại mật khẩu</a>
 </body>
 </html>

