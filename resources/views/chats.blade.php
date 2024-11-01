@include('layouts.header')


<div class="chats-wrapper">
    <div class="chats">
        <div class="chat-left">
            <div class="chat-left-top">
                <h2>Đoạn chat</h2>
                <span><i class="fa-solid fa-ellipsis"></i></span>
                <span><i class="fa-solid fa-pen-to-square"></i></span>
            </div>
            <input type="text" name="find-name" id="" placeholder="Tìm kiếm cuộc trò chuyện">
            <div class="list-chat">
                <div class="chat-left-center">
                    <div class="pic-avtar-messages">
                        <img src="../images/musa.jpg" alt="">
                    </div>
                    <span>Minh Quân</span>

                </div>
                <div class="chat-left-center">
                    <div class="pic-avtar-messages">
                        <img src="../images/musa.jpg" alt="">
                    </div>
                    <span>Thiên Tú</span>
                </div>
                <div class="chat-left-center">
                    <div class="pic-avtar-messages">
                        <img src="../images/musa.jpg" alt="">
                    </div>
                    <span>Nguyễn Thư</span>
                </div>
                <div class="chat-left-center">
                    <div class="pic-avtar-messages">
                        <img src="../images/musa.jpg" alt="">
                    </div>
                    <span>Thanh Sang</span>
                </div>
                <div class="chat-left-center">
                    <div class="pic-avtar-messages">
                        <img src="../images/musa.jpg" alt="">
                    </div>
                    <span>Văn Đạt</span>
                </div>
            </div>
        </div>
        <div class="chat-center">
            <div class="chat-center-chatbox">
                <div class="pic-avtar-messages-chat">
                    <img src="../images/musa.jpg" alt="" class='chatbox'>
                </div>

                <span class='name'>Minh Quân</span>
                <div class="icon">
                    <span><i class="fa-solid fa-phone"></i></span>
                    <span><i class="fa-solid fa-video"></i></span>
                    <span><i class="fa-solid fa-circle-info"></i></span>
                </div>
            </div>
            <hr>
            <div class="content-chat-box">

            </div>

            <div class="the-end-chat-box">

                <div class="icon-send-chatbox">
                    <span><i class="fa-solid fa-circle-plus"></i></span>
                    <span><i class="fa-solid fa-file-image"></i></span>
                    <span><i class="fa-solid fa-face-smile"></i></span>
                    <span><i class="fa-solid fa-gifts"></i></span>
                </div>
                <label for="input-content">
                    <form action="" method="get">
                        <input type="text" name="content-chat" id="">
                        <button type="submit" class="send-chat">➤</button>
                    </form>
                </label>

            </div>
        </div>
        <div class="chat-right">
            <div class="chat-right-setting">
                <div class="pic-avtar-messages-setting">
                    <img src="../images/musa.jpg" alt="" class='chatbox'>
                </div>

            </div>
        </div>
    </div>
</div>


</body>

</html>