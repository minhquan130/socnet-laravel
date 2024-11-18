require('dotenv').config();
const express = require('express');
const app = express();

// Sửa lỗi chính tả từ 'locahost' thành 'localhost'
const host = process.env.HOST || 'localhost'; 
const port = process.env.PORT || 3000;

app.get('/', (req, res) => {
    res.send('Hello');
});

// Khởi động server
const server = app.listen(port, () => {
    console.log(`Server is started on http://${host}:${port}`);
});

// Khởi tạo socket io
const io = require('socket.io')(server, {
    cors: { origin: '*' // Cho phép tất cả các nguồn
    }
});

io.on('connection', socket => {
    console.log('Có người đã kết nối');

    socket.on('send_msg', data => {
        const message = data.message;
        const currentUserId = data.currentUserId;
        // Phát lại tin nhắn tới tất cả các client đang kết nối
        io.emit('receive_msg', { message, currentUserId });
    });
    
    socket.on('disconnect', () => {
        console.log('Ngắt kết nối');
    });
});
