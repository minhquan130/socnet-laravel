<!-- resources/views/auth/passwords/forgot.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
    <link rel="stylesheet" href="{{ asset('css/forgetpassword.css') }}">
</head>

<body>
<div class="forgetPassword-contaiter">
        <h2>Lấy lại mật khẩu</h2>
  
        <form action="" method="post" class="form-forgetpassword">
        @csrf
    
            <label for>
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="email" id="email"
                    placeholder="Nhập Email đã đăng ký" required>
                @error('email') <small class="help-block">{{$message}}</small>@enderror
            </label>
           
            <!-- <label for>
                <i class="fa-solid fa-user"></i>
                <input type="hidden" name="Otp" id="name" placeholder="Nhập mã OTP"
                    required>
            </label> -->
        
            <!-- <label for>
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="Changepassword" id="password"
                    placeholder="Mật khẩu mới" required>
            </label>
            
            <label for>
                <i class="fa-solid fa-rotate-right"></i>
                <input type="password" name="agin_password"
                    id="again_password" placeholder="Xác thực mật khẩu" required>
            </label>
           -->
            <label for="" class="btn-changepass">
                 <input type="submit" value="Gửi">
        </form>
    </div>

</body>

</html>