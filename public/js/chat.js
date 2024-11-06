const InputChatMessage = document.getElementById('chat-message');
const btnSendMessage = document.getElementById('send-message');

// btnSendMessage.addEventListener('click', function () {
//     // Lấy đường dẫn URL hiện tại
//     const path = 'chats/message/${}';

//     // fetch(path, {
//     //     method: 'POST',
//     //     headers: {
//     //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//     //         'Content-Type': 'application/json'
//     //     },
//     //     body: JSON.stringify({ id: postId })
//     // })
//     //     .then(response => {
//     //         // console.log('Response:', response); // Kiểm tra phản hồi từ server
//     //         return response.json();
//     //     })
//     //     .then(data => {
//     //         // Cập nhật số lượng like
//     //         document.getElementById(`qty-likes-post-` + postId).innerText = data[1];
//     //         btnLike = document.querySelector(`.btn-like-post-` + postId);
//     //         console.log(data);


//     //         if (data[0] == 1) {
//     //             btnLike.style.color = '#ff7e7e';
//     //         } else {
//     //             btnLike.style.color = '#000';
//     //         }
//     //         // console.log(data);
//     //     })
//     //     .catch(error => console.error('Error:', error));
// });