const showMediaPost = document.getElementById('show-media-post');
const imgShowMediaPost = document.getElementById('img-show-media-post');
const inputPicture = document.getElementById('input-picture');
const btnClosePreview = showMediaPost.querySelector('.close');
const arrOtherPost = document.querySelectorAll('.other-post');
const optionLikes = document.querySelectorAll('.option-like');

let isLiked = false;

inputPicture.addEventListener('change', chooseFile);
btnClosePreview.addEventListener('click', closeFile);
arrOtherPost.forEach(otherPost => {
    // console.log(otherPost.parentElement.querySelector('.options-item-post'));

    const optionsItemPost = otherPost.parentElement.querySelector('.options-item-post');
    otherPost.addEventListener('click', () => showOptionItemPost(optionsItemPost));
})
optionLikes.forEach(optionLike => {
    optionLike.addEventListener('click', () => {
        if (!isLiked) {
            optionLike.style.color = '#ff7e7e';
            isLiked = true;
        } else {
            optionLike.style.color = '#000';
            isLiked = false;
        }
    });
});

function chooseFile() {
    if (inputPicture.files && inputPicture.files[0]) {
        const file = inputPicture.files[0];

        // Kiểm tra xem tệp có phải là hình ảnh không
        if (file.type.startsWith('image/')) {
            showMediaPost.style.display = 'flex';
            const reader = new FileReader();

            // Khi tệp được đọc xong, hiển thị ảnh
            reader.onload = function (e) {
                imgShowMediaPost.src = e.target.result;
            }

            reader.readAsDataURL(file); // Đọc tệp dưới dạng URL để hiển thị
        } else {
            alert('Vui lòng chọn một tệp hình ảnh.');
        }
    }
}

function closeFile() {
    showMediaPost.style.display = 'none';  // Ẩn phần tử chứa ảnh
    imgShowMediaPost.src = '';             // Xóa URL của ảnh
    inputPicture.value = '';               // Reset input file để người dùng có thể chọn tệp mới
}

function showOptionItemPost(optionsItemPost) {
    // Toggle hiển thị
    if (optionsItemPost.style.display === 'none' || optionsItemPost.style.display === '') {
        optionsItemPost.style.display = 'flex';
        // Thêm sự kiện `click` để ẩn khi nhấp ra ngoài
        // const hideOnClickOutside = (event) => {
        //     if (!optionsItemPost.contains(event.target)) {
        //         optionsItemPost.style.display = 'none';
        //         document.removeEventListener('click', hideOnClickOutside);
        //         console.log(true);
                
        //     }
        // };
        // document.addEventListener('click', hideOnClickOutside);
    } else {
        optionsItemPost.style.display = 'none';
    }
}

$(document).ready(function() {
    // Lắng nghe sự kiện gửi của form trong modal
    $('#commentModal').on('submit', '#commentForm', function(e) {
        e.preventDefault();

        // Lấy bình luận và ID bài viết
        let comment = $('#input-comment').val();
        let postId = $(this).data('post-id'); // Đảm bảo ID bài viết được thiết lập trên form

        $.ajax({
            url: "{{ route('comments.store', ':id') }}".replace(':id', postId), // Thay ':id' bằng postId
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                comment: comment
            },
            success: function(response) {
                if(response.status === 'success') {
                    // Thêm comment mới vào danh sách trên trang
                    $('#commentsList').prepend('<p>' + response.comment.content + '</p>'); // Thêm dấu '#' trước 'commentsList'

                    // Xóa nội dung trong input sau khi gửi comment
                    $('#input-comment').val('');
                }
            },
            error: function(response) {
                alert('Đã xảy ra lỗi. Vui lòng thử lại.');
            }
        });
    });
});
