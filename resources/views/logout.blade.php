<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Xuất</title>
    <link rel="stylesheet" href="{{asset('css/logout.css')}}">

</head>

<body>
    <div class="logout-container">
        <h2>Đăng Xuất</h2>
        
        <h4>Bạn có muốn đăng xuất hay không ?</h4>
        <br>
        <div class="dangxuat">
            <!-- Nút Hủy sẽ dẫn người dùng về trang trước hoặc một trang khác tùy ý -->
            <div class="back"><a href="javascript:history.back()">Hủy</a></div>

            <!-- Nút Đồng ý sẽ gửi yêu cầu đăng xuất -->
            <div class="yes">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Đồng ý</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>