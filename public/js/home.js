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
// optionLikes.forEach(optionLike => {
//     optionLike.addEventListener('click', () => {
//         if (!isLiked) {
//             optionLike.style.color = '#ff7e7e';
//             isLiked = true;
//         } else {
//             optionLike.style.color = '#000';
//             isLiked = false;
//         }
//     });
// });

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
    } else {
        optionsItemPost.style.display = 'none';
    }
}
// 
// document.getElementById('commentForm{{ $post->id }}').addEventListener('submit', function (event) {
//     event.preventDefault(); // Ngăn chặn gửi form mặc định

//     const form = this;
//     const commentInput = form.querySelector('input[name="comment"]');
//     const commentText = commentInput.value;

//     // Gửi dữ liệu bình luận bằng AJAX
//     fetch(form.action, {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': '{{ csrf_token() }}'
//         },
//         body: JSON.stringify({ comment: commentText })
//     })
//         .then(response => response.json())
//         .then(data => {
//             const commentElement = document.createElement('p');
//             commentElement.innerHTML = `
//             <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="img-fluid rounded-circle me-2" style="width: 40px; height: 40px;">
//             <span>${commentText}</span>
//         `;
//             document.getElementById('commentsList{{ $post->id }}').appendChild(commentElement);
//             commentInput.value = '';
//         })
//         .catch(error => console.error('Error:', error));
// });


const likeButtons = document.querySelectorAll('.like-btn');
likeButtons.forEach(button => {
    button.addEventListener('click', function () {
        const postId = this.getAttribute('data-id');
        const path = '/like/post-' + postId;
        console.log(path);

        fetch(path, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: postId })
        })
            .then(response => {
                // console.log('Response:', response); // Kiểm tra phản hồi từ server
                return response.json();
            })
            .then(data => {
                // Cập nhật số lượng like
                document.getElementById(`qty-likes-post-` + postId).innerText = data[1];
                btnLike = document.querySelector(`.btn-like-post-` + postId);
                console.log(data);
                
                
                if (data[0] == 1) {
                    btnLike.style.color = '#ff7e7e';
                }else{
                    btnLike.style.color = '#000';
                }
                // console.log(data);
            })
            .catch(error => console.error('Error:', error));
    });
});



