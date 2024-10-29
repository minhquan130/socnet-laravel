<div class="container_sidebar">
    <div class="sidebar">
        <div class="card-profile">
            <a href="{{ route('profile') }}" class="profile-picture" style="display: block">
                <img src="{{ asset('images/avatar.png') }}" alt="">
            </a>
            <div class="name">
                <span>{{ $user->username }}</span>
            </div>
            <div class="bio">
                @if ($user->bio)
                    <span>{{ $user->bio }}</span>
                @else
                    <span style="display: inline-flex; gap: 1rem;">
                        Bạn chưa có tiểu sử
                        <a href="#">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </span>
                @endif
            </div>
            <hr  class="hr-card-profile" style="margin: 1rem 0">
            <div class="data">
                <div class="data-followings">
                    <span>890</span> Followings
                </div>
                <hr class="hr-card-profile">
                <div class="data-followers">
                    <span>99</span> Followers
                </div>
                <hr class="hr-card-profile">
                <div class="data-posts">
                    <span>11</span> Posts
                </div>
            </div>
            <hr  class="hr-card-profile" style="margin: 1rem 0 0 0">
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
