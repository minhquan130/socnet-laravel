<div class="container_sidebar">
    <div class="sidebar">
        <div class="card-profile">
            <a href="{{ route('profile', ['userId' =>  $userCurrent->user_id]) }}" class="profile-picture" style="display: block">
                <img src="{{ $userCurrent->profile_pic_url == null ? asset('images/none-avatar.jpg') : $userCurrent->profile_pic_url }}"
                    alt="">
            </a>
            <div class="name">
                <span>{{ $userCurrent->username }}</span>
            </div>
            <div class="bio">
                @if ($userCurrent->bio)
                    <span>{{ $userCurrent->bio }}</span>
                @else
                    <span style="display: inline-flex; gap: 1rem;">
                        Bạn chưa có tiểu sử
                        <a href="#">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </span>
                @endif
            </div>
            <hr class="hr-card-profile" style="margin: 1rem 0">
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
            <hr class="hr-card-profile" style="margin: 1rem 0 0 0">
        </div>
        @if ($followers->isNotEmpty())
        <div class="followers">
            <h3>Những người theo dõi bạn</h3>
            <hr>
            <div class="list-followers">
                @foreach ($followers as $follower)
                <div class="item-follower">
                            <div class="info-follower">
                                <div class="avarta-follower">
                                    <img src="{{ $follower->users->profile_pic_url == null ? asset('images/none-avatar.jpg') : $follower->users->profile_pic_url }}" alt="">
                                </div>
                                <div class="name-follower">{{ $follower->users->username }}</div>
                            </div>
                            <button class="btn-follow">Theo dõi</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
