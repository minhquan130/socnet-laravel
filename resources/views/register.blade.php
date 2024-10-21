<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="register-container">
        <h2>Đăng Ký</h2>
        <form action="{{ route('register.store') }}" method="post" class="form-register">
            @csrf
            <label for>
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="email" id="email"
                    placeholder="Email hoặc số điện thoại" required>
            </label>
           
            <label for>
                <i class="fa-solid fa-user"></i>
                <input type="text" name="name" id="name" placeholder="Name"
                    required>
            </label>
        
            <label for>
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password"
                    placeholder="Password" required>
            </label>
            
            <label for>
                <i class="fa-solid fa-rotate-right"></i>
                <input type="password" name="agin_password"
                    id="again_password" placeholder="Again_password" required>
            </label>
          
            
            <label for="" class="btn-submit">
                 <input type="submit" value="Đăng ký">
            </label>
           
        </form>
         
        <div class="cotaikhoan"></div>
        <a href="{{ route('login') }}">Bạn có tài khoản ?</a>
        </div>
       
    </div>
</body>
</html>