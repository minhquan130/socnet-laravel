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
                        <b>Trạng thái</b>
                    </span>
                    <span>Bạn bè</span>
                </div>
                <div class="info">
                    <span>
                        <b>Nơi ở</b>
                    </span>
                    <span>TPHCM</span>
                </div>
                <div class="info">
                    <span>
                        <b>Làm việc ở</b>
                        <span>ESC</span>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="container_sidebar">
            <div class="sidebar">
                <div class="card-profile">
                    <div class="profile-picture">
                        <img src="{{ asset('images/avatar.png') }}" alt="">
                    </div>
                    <div class="name">
                        <span>Victory Tikay</span>
                    </div>
                    <div class="bio">
                        <span>Hello World</span>
                    </div>
                    <hr style="margin: 1rem 0">
                    <div class="data">
                        <div class="data-followings">
                            <span>890</span> Followings
                        </div>
                        <hr>
                        <div class="data-followers">
                            <span>99</span> Followers
                        </div>
                        <hr>
                        <div class="data-posts">
                            <span>11</span> Posts
                        </div>
                    </div>
                    <hr style="margin: 1rem 0 0 0">
                </div>
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