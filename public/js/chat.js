const chatMessages = document.querySelector('.chat-messages');
const InputChatMessage = document.getElementById('chat-message');
const btnSendMessage = document.getElementById('send-message');

chatMessages.scrollTop = chatMessages.scrollHeight;

btnSendMessage.addEventListener('click', function () {
    // Lấy đường dẫn URL hiện tại
    const path = window.location.pathname;
    console.log(InputChatMessage.value);
    

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
            // console.log(data.message.content);
            InputChatMessage.value = ''
            chatMessages.innerHTML += `
                <div class="message-user">
                    <p class="message">${data.message.content}</p>
                </div>
            `;
            chatMessages.scrollTop = chatMessages.scrollHeight;
        })
        .catch(error => console.error('Error:', error));
});