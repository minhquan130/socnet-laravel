    @include('layouts.header')
    <div class="profile">
        <div class="profile-left">
            <div class="info-card">
                <div class="info-head">
                    <h4>Thông tin người dùng</h4>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="z-index: 10">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
                <div class="info">
                    <span>
                        <b>Tên của bạn: </b>
                    </span>
                    <span>Thiên Tú</span>
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
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa thông tin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="edit">
                                <div class="edit-name">
                                    <span>Tên người dùng</span>
                                    <input type="text" name="user-name" id="name" placeholder="Nhập tên của bạn">
                                </div>
                                <div class="edit-address">
                                    <span>Địa chỉ</span>
                                    <input type="text" name="address" id="address" placeholder="Nhập địa chỉ">
                                </div>
                                <div class="edit-company">
                                    <span>Làm việc ở</span>
                                    <input type="text" name="" id="" placeholder="Nhập tên công ty">
                                </div>
                                <div class="edit-relationship">
                                    <span>Tình trạng</span>
                                    <input type="text" name="" id="" placeholder="Nhập tình trạng mối quan hệ">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
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