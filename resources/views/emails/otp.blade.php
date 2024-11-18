
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận OTP</title>
</head>
<body>
  <h2>Xin Chào {{$user->name}}</h2>
    <p>Email này sẽ giúp bạn lấy lại mật khẩu </p>
    <p>Vui lòng click vào link dưới đây để đặt lại mật khẩu </p>
    <p>Chú ý: Mã xác nhận trong link chỉ có hiệu lực trong vòng 24 giờ</p>
    <p>
        <a href="{{route('password.getPass',['user' =>$user ->id ,'token' => $user ->token])}}">
            Đặt lại mật khẩu
        </a>
    </p>
   

</body>
</html>
