    @include('layouts.header')
    @include('layouts.main')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const defaultAvatar = "{{ asset('images/none-avatar.jpg') }}"; // Tạo biến chứa đường dẫn đến ảnh mặc định
        const showMediaPost = document.getElementById('show-media-post');
        const inputPicture = document.getElementById('input-picture');
        const btnClosePreview = showMediaPost.querySelector('.close');
        inputPicture.addEventListener('change', chooseFile);
        btnClosePreview.addEventListener('click', closeFile);

        function chooseFile() {
            if (inputPicture.files && inputPicture.files[0]) {
                const file = inputPicture.files[0];

                // Kiểm tra xem tệp có phải là hình ảnh không
                if (file.type.startsWith('image/')) {
                    showMediaPost.style.display = 'flex';
                    const reader = new FileReader();

                    // Khi tệp được đọc xong, hiển thị ảnh
                    reader.onload = function(e) {
                        imgShowMediaPost.src = e.target.result;
                    }

                    reader.readAsDataURL(file); // Đọc tệp dưới dạng URL để hiển thị
                } else {
                    alert('Vui lòng chọn một tệp hình ảnh.');
                }
            }
        }

        function closeFile() {
            showMediaPost.style.display = 'none'; // Ẩn phần tử chứa ảnh
            imgShowMediaPost.src = ''; // Xóa URL của ảnh
            inputPicture.value = ''; // Reset input file để người dùng có thể chọn tệp mới
        }
    </script>
    <script src="{{ asset('js/home.js') }}"></script>
    </body>

    </html>
