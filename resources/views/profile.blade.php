    @include('layouts.header')
    <div class="profile">
        <div class="profile-left">
            <div class="info-card">
                <div class="info-head">
                    <h4>Thông tin của bạn</h4>
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
                <div class="info">
                    <span>
                        <b>Trạng thái: </b>
                    </span>
                    <span>Bạn bè</span>
                </div>
                <div class="info">
                    <span>
                        <b>Nơi ở: </b>
                    </span>
                    <span>TPHCM</span>
                </div>
                <div class="info">
                    <span>
                        <b>Làm việc ở: </b>
                        <span>ESC</span>
                    </span>
                </div>
                <div class="info">
                    <span>
                        <b>Tình trạng: </b>
                        <span>Quan hệ mập mờ</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="profile-container">
            <div class="profile-right">
                <div class="avatar">
                    <img src="{{ asset('images/avatar.png') }}" alt="">
                </div>
                <div class="info-right">
                    <span>Thiên Tú</span>
                    <div class="user-post-follow">
                        <span class="post">0 Post</span>
                        <span class="follower">300 follower</span>
                        <span class="following">50000 following</span>
                    </div>
                </div>
            </div>
            
            <div class="story">
                <div class="list-story">
                   <img src="{{ asset('images/background.jpg') }}" alt=""> 
                   <span>Hello world</span>
                </div>
                <div class="list-story">
                    <img src="{{ asset('images/avatar.png') }}" alt=""> 
                    <span>Love</span>
                 </div>
                 <div class="list-story">
                    <img src="{{ asset('images/background.jpg') }}" alt=""> 
                    <span>meo meo</span>
                 </div>
                 <div class="list-story">
                    <img src="{{ asset('images/avatar.png') }}" alt=""> 
                    <span>work</span>
                 </div>
                 <div class="list-story">
                    <img src="{{ asset('images/background.jpg') }}" alt=""> 
                    <span>boring</span>
                 </div>
            </div>
        </div>
        
        <div class="container_sidebar">
            <div class="sidebar">
                <div class="followers">
                    <h3>Những người theo dõi bạn</h3>
                    <hr>
                    <div class="list-followers">
                        <div class="item-follower">
                            <div class="info-follower">
                                <div class="avarta-follower">
                                    <img src="{{ asset('images/avatar.png') }}" alt="">
                                </div>
                                <div class="name-follower">Minh Quân</div>
                            </div>
                            <button class="btn-follow">Theo dõi</button>
                        </div>
                        <div class="item-follower">
                            <div class="info-follower">
                                <div class="avarta-follower">
                                    <img src="{{ asset('images/avatar.png') }}" alt="">
                                </div>
                                <div class="name-follower">Thiên Tú</div>
                            </div>
                            <button class="btn-follow">Theo dõi</button>
                        </div>
                        <div class="item-follower">
                            <div class="info-follower">
                                <div class="avarta-follower">
                                    <img src="{{ asset('images/avatar.png') }}" alt="">
                                </div>
                                <div class="name-follower">Thanh Sang</div>
                            </div>
                            <button class="btn-follow">Theo dõi</button>
                        </div>
                        <div class="item-follower">
                            <div class="info-follower">
                                <div class="avarta-follower">
                                    <img src="{{ asset('images/avatar.png') }}" alt="">
                                </div>
                                <div class="name-follower">Thanh Sang</div>
                            </div>
                            <button class="btn-follow">Theo dõi</button>
                        </div>
                        <div class="item-follower">
                            <div class="info-follower">
                                <div class="avarta-follower">
                                    <img src="{{ asset('images/avatar.png') }}" alt=""> 
                                </div>
                                <div class="name-follower">Thanh Sang</div>
                            </div>
                            <button class="btn-follow">Theo dõi</button>
                        </div>
                        <div class="item-follower">
                            <div class="info-follower">
                                <div class="avarta-follower">
                                    <img src="{{ asset('images/avatar.png') }}" alt="">
                                </div>
                                <div class="name-follower">Thanh Sang</div>
                            </div>
                            <button class="btn-follow">Theo dõi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
       
        
    </div>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>