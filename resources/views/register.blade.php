<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script src="{{ asset('js/all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="register-container">
        <h2>Đăng Ký</h2>
        <form action="{{ route('register.store') }}" method="post" class="form-register" enctype="multipart/form-data">
            @csrf
            <label for="email">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="email" id="email" placeholder="Email"
                    pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" title="Vui lòng nhập một địa chỉ email hợp lệ" required>
            </label>

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    Email không tồn tại!
                </div>
            @endif


            <label for="name">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="name" id="name" placeholder="Tên"
                    title="Tên không vượt quá 30 kí tự" required>
                <span style="color: red; font-size: 0.9em;"></span>
            </label>

            <!-- Trường giới tính với checkbox -->
            <label class="gender-label">
                <i class="fa-solid fa-venus-mars"></i>
                <span class="">Giới tính:</span>
                <div class="gender-options">
                    <label><input type="radio" name="gender" value="male" required checked> Nam</label>
                    <label><input type="radio" name="gender" value="female"> Nữ</label>
                    <label><input type="radio" name="gender" value="other"> Khác</label>
                </div>
            </label>

            <!-- Trường ngày sinh -->
            <label>
                <i class="fa-solid fa-calendar"></i>
                <input type="date" name="birth_date" id="birth_date" placeholder="Ngày sinh" required>
            </label>

            <label for="password">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Mật khẩu"
                    pattern="^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,15}$"
                    title="Mật khẩu phải ít nhất 6 kí tự, tối đa 15 ký tự, bao gồm ít nhất 1 chữ cái viết hoa, 1 chữ số và không có khoảng trắng"
                    maxlength="15" required>
            </label>



            <label for="confirm_password">
                <i class="fa-solid fa-rotate-right"></i>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Xác nhận mật khẩu"
                    required>
            </label>

            <!-- Trường ảnh đại diện -->
            <label for="avatar">
                <i class="fa-solid fa-image"></i>
                <input type="file" name="avatar" id="avatar" accept="image/*">
            </label>

            <label class="btn-submit">
                <input type="submit" value="Đăng ký">
            </label>

        </form>

        <div class="cotaikhoan"></div>
        <a href="{{ route('login') }}">Bạn đã có tài khoản?</a>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm_password").value;
            if (password !== confirmPassword) {
                event.preventDefault();
                alert("Mật khẩu xác nhận không khớp.");
            }
        });
    </script>

    <script>
        const inputField = document.getElementById("name");
        const errorSpan = inputField.parentElement.querySelector("span");

        inputField.addEventListener("input", function(event) {
            const input = event.target.value;

            if (input.length > 30) {
                errorSpan.textContent = "Tên không được vượt quá 30 ký tự.";
            } else {
                errorSpan.textContent = ""; // Xóa thông báo nếu không có lỗi
            }
        });
    </script>
</body>

</html>
