@include('layouts.header')

<div class="chats-wrapper">
    <div class="chats">
        <div class="chat-left">
            <h3>Đoạn chat</h3>
            <form action="#" id="form-search-chat">
                <label class="search-chat-bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Tìm kiếm đoạn chat">
                </label>
            </form>
            <div class="list-chats">
                <div class="list-chats-wrapper" style="margin-right: 1rem">
                    <div class="chat-item">
                        <img src="{{ asset('images/none-avatar.jpg') }}" alt="" class="avatar-chat">
                        <div class="name-friend-chat">Minh Quân</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-main">
            <div class="header-chat-main">
                <div class="info-friend">
                    <div class="avatar"><img src="{{ asset('images/none-avatar.jpg') }}" alt=""></div>
                    <div class="name">Minh Nhựt</div>
                </div>
            </div>

            <div class="chat-messages">
                <div class="message-friend">
                    <p class="message">Hello</p>
                </div>
                <div class="message-user">
                    <p class="message">ỏ</p>
                </div>
                <div class="message-user">
                    <p class="message">Hehehehehehehe</p>
                </div>
                <div class="message-user">
                    <p class="message">Hehehehehehehe</p>
                </div>
                <div class="message-user">
                    <p class="message">Hehehehehehehe</p>
                </div>
                <div class="message-user">
                    <p class="message">Hehehehehehehe</p>
                </div>
                <div class="message-user">
                    <p class="message">Hehehehehehehe</p>
                </div>
                <div class="message-user">
                    <p class="message">Hehehehehehehe</p>
                </div>
                <div class="message-user">
                    <div class="message-user">
                        <p class="message">Hehehehehehehe</p>
                    </div>
                    <p class="message">ỏ</p>
                </div>
                <div class="message-friend">
                    <p class="message">Hello</p>
                </div>
                <div class="message-user">
                    <p class="message">ỏ</p>
                </div>
            </div>

            <div class="chat-bar">
                <i class="fa-solid fa-image"></i>
                <i class="fa-solid fa-face-smile"></i>
                <input type="text" name="chat-message" id="chat-message">
                <i class="fa-solid fa-paper-plane" id="send-message"></i>
            </div>
        </div>
        <div class="chat-right"></div>
    </div>
</div>

    <script src="{{ asset('js/chat.js') }}"></script>
</body>

</html>
