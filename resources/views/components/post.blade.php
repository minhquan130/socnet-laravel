<div class="container_posts">
    <div class="posts">
        <form action="{{ route('post.add') }}" method="post" class="post-bar" enctype="multipart/form-data">
            @csrf
            <div class="top-post-bar">
                <div class="img-avatar">
                    <img src="{{ asset('images/avatar.png') }}" alt="">
                </div>
                <div class="form-text-post">
                    <input type="text" name="input-content" id="input-content" placeholder="Bạn đang nghĩ gì thế?">
                </div>
            </div>
            <hr style="margin: 1rem 0;">
            <div class="option-post-bar">
                <label class="option-item">
                    <i class="fa-regular fa-image"></i>
                    <span>Ảnh</span>
                    <input type="file" id="input-picture" name="input-picture" hidden>
                </label>
                <div class="option-item">
                    <i class="fa-regular fa-circle-play"></i>
                    <span>Video</span>
                </div>
                <div class="option-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Địa điểm</span>
                </div>
                <button type="submit" class="option-item" >
                    <span>Đăng</span>
                </button>
            </div>
            <div id="show-media-post">
                <div class="close">✖</div>
                <img src="" alt="" id="img-show-media-post">
            </div>
        </form>

        <div class="list-posts">
            @foreach($posts as $post)
            <div class="post-item">
                    <div class="top-post">
                        <div class="top-post-tp1">
                            <div class="avarta-post">
                                <img src="{{ asset('images/avatar.png') }}" alt="">
                            </div>
                            <div class="content-top-post">
                                <span class="name">Tikay</span>
                                <span class="posted-time">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="top-post-tp2">
                            <div class="other-post">
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>
                            <ul class="options-item-post">
                                <li><a href="{{ route('post.delete', ['id' => $post->post_id]) }}"><i class="fa-solid fa-trash"></i>Xóa bài viết</a></li>
                                <li><a href=""><i class="fa-solid fa-pen"></i>Sửa bài viết</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="content-post">
                        <div class="content-text">
                            {{ $post->content }}
                        </div>
                        @if($post->media_url)
                            <div class="content-media">
                                <img src="{{ $post->media_url }}" alt="Hình ảnh bài viết">
                            </div>
                        @endif
                    </div>
                    <div class="metrics-post">
                        <div class="count-likes">
                            <span class="icon-count-likes">
                                <i class="fa-solid fa-heart"></i>
                            </span>
                            <span>56</span>
                        </div>
                        <div class="count-comments">
                            <span>67 bình luận</span>
                        </div>
                    </div>
                    <hr>
                    <div class="options-post">
                        <div class="option option-like">
                            <span class="option-icon icon-like">
                                <i class="fa-solid fa-heart"></i>
                            </span>
                            <span>Thích</span>
                        </div>
                        <div class="option option-comment">
                            <span class="option-icon icon-comment">
                                <i class="fa-solid fa-message"></i>
                            </span>
                            <span>Bình luận</span>
                        </div>
                        <div class="option option-coppy">
                            <span class="option-icon icon-coppy">
                                <i class="fa-solid fa-link"></i>
                            </span>
                            <span>Sao chép</span>
                        </div>
                        <div class="option option-share">
                            <span class="option-icon icon-share">
                                <i class="fa-solid fa-share"></i>
                            </span>
                            <span>Chia sẻ</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>        
    </div>
</div>