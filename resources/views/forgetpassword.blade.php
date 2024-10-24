<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="{{ asset('css/forgetpassword.css') }}">
    //test git
</head>
<body>
    <div class="forgetPassword-contaiter">
        <h2>Quên mật Khẩu</h2>
        <form action="#" method="post" class="form-forgetpassword">
            <label for>
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="email" id="email"
                    placeholder="Nhập Email hoặc SĐT đã đăng ký" required>
            </label>
           
            <label for>
                <i class="fa-solid fa-user"></i>
                <input type="text" name="Otp" id="name" placeholder="Nhập mã OTP"
                    required>
            </label>
        
            <label for>
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="Changepassword" id="password"
                    placeholder="Mật khẩu mới" required>
            </label>
            
            <label for>
                <i class="fa-solid fa-rotate-right"></i>
                <input type="password" name="agin_password"
                    id="again_password" placeholder="Xác thực mật khẩu" required>
            </label>
          
            <label for="" class="btn-changepass">
                 <input type="submit" value="Thay Đổi">
            </label>
        </form>
    </div>
</body>
</html>