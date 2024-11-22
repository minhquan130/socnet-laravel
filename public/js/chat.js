const socket = io('http://localhost:3000/')
const chatMessages = document.querySelector('.chat-messages');
const InputChatMessage = document.getElementById('chat-message');
const btnSendMessage = document.getElementById('send-message');

chatMessages.scrollTop = chatMessages.scrollHeight;

btnSendMessage.addEventListener('click', function () {
    // Lấy đường dẫn URL hiện tại
    const path = window.location.pathname;

    fetch(path, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ chatMessage: InputChatMessage.value })
    })
        .then(response => {
            return response.json();
        })
        .then(data => {
            const message = data.message;
            const currentUserId = data.currentUserId;
            socket.emit('send_msg', {
                message,
                currentUserId
            });
        })
        .catch(error => console.error('Error:', error));
});


socket.on('receive_msg', data1 => {
    const path = '/get-user-id';

    fetch(path, {
        method: 'get',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        }
    })
        .then(response => {
            return response.json();
        })
        .then(data2 => {
            if (data1.currentUserId === data2.userId) {
                InputChatMessage.value = ''
                chatMessages.innerHTML += `
                    <div class="message-user">
                        <p class="message">${data1.message.content}</p>
                    </div>
                `;
            }else{
                chatMessages.innerHTML += `
                    <div class="message-friend">
                        <p class="message">${data1.message.content}</p>
                    </div>
                `;
            }
            chatMessages.scrollTop = chatMessages.scrollHeight;
        })
        .catch(error => console.error('Error:', error));
})