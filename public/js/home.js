
const imgShowMediaPost = document.getElementById('img-show-media-post');
const arrOtherPost = document.querySelectorAll('.other-post');
const optionLikes = document.querySelectorAll('.option-like');

arrOtherPost.forEach(otherPost => {
    // console.log(otherPost.parentElement.querySelector('.options-item-post'));

    const optionsItemPost = otherPost.parentElement.querySelector('.options-item-post');
    otherPost.addEventListener('click', () => showOptionItemPost(optionsItemPost));
})

function showOptionItemPost(optionsItemPost) {
    // Toggle hiển thị
    if (optionsItemPost.style.display === 'none' || optionsItemPost.style.display === '') {
        optionsItemPost.style.display = 'flex';
    } else {
        optionsItemPost.style.display = 'none';
    }
}

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
                } else {
                    btnLike.style.color = '#000';
                }
                // console.log(data);
            })
            .catch(error => console.error('Error:', error));
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const commentForms = document.querySelectorAll('.text-comment');

    commentForms.forEach(form => {
        const button = form.querySelector('.submit-comment');
        if (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Ngăn không cho form gửi dữ liệu theo cách truyền thống

                const postId = form.dataset.postId;
                const commentInput = form.querySelector('input[name="comment"]');
                const comment = commentInput.value.trim();

                if (comment === '') {
                    alert('Bình luận không được để trống.');
                    return;
                }

                fetch('/comment/add', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ comment: comment, 'post-id': postId }) // Đảm bảo tên trường đúng
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const commentsList = document.querySelector('#commentsList-post-' + data.dataComment.post_id);
                        const qtyComments = document.querySelector('#qty-comments-post-' + data.dataComment.post_id);
                        const avatar = data.dataComment.profile_pic_url ? data.dataComment.profile_pic_url : defaultAvatar;
                        const username = data.dataComment.username;
                        const content = data.dataComment.content;
                        console.log(avatar);

                        commentsList.insertAdjacentHTML('beforeend', `
                            <div class="item-comment">
                                <img src="${avatar}" alt="Avatar" class="img-fluid rounded-circle" style="width: 40px; height: 40px;">
                                <div class="content-comment">
                                    <p class="username-comment">${username}</p>
                                    <p>${content}</p> <!-- Dùng nội dung bình luận từ phản hồi -->
                                </div>
                            </div>
                        `);
                        commentInput.value = '';    
                        const newQtyCmt = Number(qtyComments.innerHTML.split(' ')[0]) + 1; 
                        qtyComments.innerHTML = newQtyCmt + ' bình luận';

                    })
                    .catch(error => console.error('Error:', error));
            });
        }
    });
});

// viết cái phàn về edit bình luận 
$('.submit-edit').on('click', function (e) {
    e.preventDefault();
    const postId = $(this).data('id');
    const content = $('#input-content-' + postId).val();

    $.ajax({
        url: '/post/update/' + postId,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            'input-content': content
        },
        success: function (response) {
            $('#updatePostModal' + postId).modal('hide');
            location.reload();
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

// chia sẽ bài viết
function copyToClipboard() {
    const copyText = document.getElementById("shareLink");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // Dành cho mobile
    navigator.clipboard.writeText(copyText.value)
        .then(() => alert("Liên kết đã được sao chép!"))
        .catch(() => alert("Không thể sao chép liên kết!"));
}


