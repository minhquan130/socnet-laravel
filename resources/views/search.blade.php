@include('layouts.header')
<div class="wrapper-search">
    <div class="filter-search"></div>
    <div class="result-search">
        @if ($resultUsername->count() !== 0)
            <div class="friend-search">
                <h1>Mọi người</h1>
                @foreach ($resultUsername as $user)
                    <div class="item-friend">
                        <p class="avatar">
                            <a href="{{ route('profile', ['userId' => $user->user_id]) }}">
                                <img src="{{ $user->profile_pic_url == null ? asset('images/none-avatar.jpg') : $user->profile_pic_url }}"
                                    alt="">
                            </a>
                        </p>
                        <p class="name">
                            {{ $user->username }}
                        </p>
                        @if (!$user->isFriend)
                            <a href="{{ route('friends.add', ['id' => $user->user_id]) }}">
                                <button class="button-add-friend">
                                    Thêm bạn bè
                                </button>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
        <div class="post-search">
            <h1>Bài viết</h1>
            <div class="list-posts">
                @foreach ($resultContentPost as $post)
                    <div class="post-item">
                        <div class="top-post">
                            <div class="top-post-tp1">
                                <div class="avarta-post">
                                    <a href="{{ route('profile', ['userId' => $post->user_id]) }}">
                                        <img src="{{ $post->profile_pic_url == null ? asset('images/none-avatar.jpg') : $post->profile_pic_url }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="content-top-post">
                                    <span class="name">{{ $post->username }}</span>
                                    <span class="posted-time">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="top-post-tp2">
                                <div class="other-post">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                                <ul class="options-item-post">
                                    <li><a href="{{ route('post.delete', ['id' => $post->post_id]) }}"><i
                                                class="fa-solid fa-trash"></i>Xóa bài viết</a></li>
                                    <li data-bs-toggle="modal" data-bs-target="#updatePostModal{{ $post->post_id }}">
                                        <i class="fa-solid fa-pen"></i>Sửa bài viết
                                    </li>
                                </ul>
                            </div>

                            <!-- Modal of chỉnh sửa bài biết  -->
                            <!-- Modal -->
                            <div class="modal fade" id="updatePostModal{{ $post->post_id }}" tabindex="-1"
                                aria-labelledby="updatePostModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="updatePostModalLabel">Sửa bài viết</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('post.edit', ['id' => $post->post_id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="modal-body-post"
                                                    style="display: flex;  align-items: center; ">
                                                    <img src="{{ $post->profile_pic_url == null ? asset('images/none-avatar.jpg') : $post->profile_pic_url }}"
                                                        alt=""
                                                        style="width: 50px; height: 50px; border-radius: 50%">
                                                    <span class="name">{{ $post->username }}</span>
                                                </div>

                                                <!-- Nội dung bài viết -->
                                                <textarea name="input-content" class="form-control">{{ $post->content }}   
                                           </textarea>

                                                @if ($post->sharedPost)
                                                    <div
                                                        class="modal-body-share"style="display: flex;  align-items: center; ">
                                                        <img src="{{ $post->sharedPost->profile_pic_url == null ? asset('images/none-avatar.jpg') : $post->sharedPost->profile_pic_url }}"
                                                            alt=""
                                                            style="width: 50px; height: 50px; border-radius: 50%">
                                                        <span class="name">{{ $post->sharedPost->username }}</span>
                                                    </div>
                                                    <!-- Nội dung bài viết dược chia sẽ -->
                                                    <p name="input-content" class="form-control">
                                                        {{ $post->sharedPost->content }}

                                                    </p>

                                                    <!-- Hiển thị ảnh hiện tại nếu có -->
                                                    @if ($post->sharedPost->media_url)
                                                        <div class="current-image my-3">

                                                            <img src="{{ $post->sharedPost->media_url }}"
                                                                alt="Ảnh hiện tại"
                                                                style="width: 100%; max-height: 200px; object-fit: cover;">
                                                        </div>
                                                    @endif
                                                @endif

                                                <!-- Hiển thị ảnh hiện tại nếu có -->
                                                @if ($post->media_url)
                                                    <div class="current-image my-3">
                                                        <label>Ảnh hiện tại:</label>
                                                        <img src="{{ $post->media_url }}" alt="Ảnh hiện tại"
                                                            style="width: 100%; max-height: 200px; object-fit: cover;">
                                                    </div>
                                                @endif

                                                <!-- Hiển thị ảnh hiện tại nếu có -->
                                                @if ($post->media_url)
                                                    <div class="current-image my-3">
                                                        <label>Ảnh hiện tại:</label>
                                                        <img src="{{ $post->media_url }}" alt="Ảnh hiện tại"
                                                            style="width: 100%; max-height: 200px; object-fit: cover;">
                                                    </div>
                                                @endif



                                                <!-- Input để tải ảnh mới -->
                                                <div class="mt-3">
                                                    <label for="input-picture" class="form-label">Chọn ảnh mới (nếu muốn
                                                        thay
                                                        đổi)</label>
                                                    <input type="file" name="input-picture" class="form-control"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->

                        </div>
                        <div class="content-post">
                            <div class="content-text">
                                {{ $post->content }}
                            </div>
                            @if ($post->media_url)
                                <div class="content-media">
                                    <img src="{{ $post->media_url }}" alt="Hình ảnh bài viết">
                                </div>
                            @endif
                            @if ($post->sharedPost)
                                <div class="share"
                                    style="padding: 1rem; border: 2px solid #696969 ; border-radius:20px">
                                    <div class="info-share" style="display: flex; ">
                                        <div class="avatar">
                                            <img src="{{ $post->sharedPost->profile_pic_url == null ? asset('images/none-avatar.jpg') : $post->sharedPost->profile_pic_url }}"
                                                alt="" style="width: 50px; height: 50px; border-radius: 50%">
                                        </div>
                                        <div class="name-share" style="font-weight: bold;">
                                            {{ $post->sharedPost->username }}
                                        </div>
                                    </div>
                                    <p>{{ $post->sharedPost->content }}</p>
                                    @if ($post->sharedPost->media_url)
                                        <div class="content-media">
                                            <img src="{{ $post->sharedPost->media_url }}" alt="Hình ảnh bài viết">
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div class="metrics-post">
                            <div class="count-likes">
                                <span class="icon-count-likes">
                                    <i class="fa-solid fa-heart"></i>
                                </span>
                                @php
                                    $likesModel = new \App\Models\Likes();
                                    $countLike = $likesModel->getCountLikeById($post->post_id);
                                @endphp
                                <span id="qty-likes-post-{{ $post->post_id }}">
                                    {{ $countLike }}
                                </span>
                            </div>
                            <div class="count-comments">
                                @php
                                    $commentsModel = new \App\Models\Comments();
                                    $countComments = $commentsModel->getCountCommentByPostId($post->post_id);
                                @endphp
                                <a class="option option-comment" data-bs-toggle="modal"
                                    data-bs-target="#commentModal{{ $post->post_id }}">
                                    <span id="qty-comments-post-{{ $post->post_id }}">{{ $countComments }} bình
                                        luận</span>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="options-post">
                            <button class="option option-like like-btn btn-like-post-{{ $post->post_id }}"
                                data-id="{{ $post->post_id }}"
                                style="background: none; border: none; color: {{ $likesModel->isLiked($post->post_id) ? '#ff7e7e' : '#000' }}">
                                <span class="option-icon icon-like">
                                    <i class="fa-solid fa-heart"></i>
                                </span>
                                <span>Thích</span>
                            </button>
                            <div class="option option-comment" data-bs-toggle="modal"
                                data-bs-target="#commentModal{{ $post->post_id }}">
                                <span class="option-icon icon-comment">
                                    <i class="fa-solid fa-message"></i>
                                </span>
                                <span>Bình luận</span>
                            </div>
                            {{-- <div class="option option-coppy">
                            <span class="option-icon icon-coppy">
                                <i class="fa-solid fa-link"></i>
                            </span>
                            <span>Sao chép</span>
                        </div> --}}
                            <!--  -->
                            <div class="option option-share">
                                <span class="option-icon icon-share" data-bs-toggle="modal"
                                    data-bs-target="#sharePostModal{{ $post->post_id }}">
                                    <i class="fa-solid fa-share"></i>
                                </span>
                                <span data-bs-toggle="modal"
                                    data-bs-target="#sharePostModal{{ $post->post_id }}">Chia sẻ</span>
                            </div>


                        </div>
                    </div>

                    <!-- Modal Chia sẻ -->
                    <div class="modal fade" id="sharePostModal{{ $post->post_id }}" tabindex="-1"
                        aria-labelledby="sharePostModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sharePostModalLabel">Chia sẻ bài viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('posts.share', $post->post_id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <!-- Hiển thị nội dung bài viết gốc -->
                                        <p><strong>Bài viết chia sẻ từ:</strong> {{ $post->username }}</p>
                                        <p>{{ $post->content }}</p>

                                        <!-- Nội dung mới của bài viết (nếu có) -->
                                        <div class="form-group mt-3">
                                            <label for="share-content">Nội dung chia sẻ (tuỳ chọn):</label>
                                            <textarea class="form-control" name="content" id="share-content" rows="3" placeholder="Viết gì đó..."></textarea>
                                        </div>

                                        <!-- Ảnh của bài viết chia sẻ -->
                                        @if ($post->media_url)
                                            <div class="mt-3">
                                                <label>Ảnh chia sẻ:</label>
                                                <img src="{{ $post->media_url }}" alt="Hình ảnh bài viết"
                                                    class="img-fluid">
                                            </div>
                                        @endif
                                    </div>
                                    <input type="hidden" name="shared_post_id" value="{{ $post->post_id }}">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-primary">Chia sẻ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



















                    <!-- Modal comment-->
                    <div class="modal fade" id="commentModal{{ $post->post_id }}" tabindex="-1"
                        aria-labelledby="commentModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commentModalLabel">Bình luận</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="commentsList-post-{{ $post->post_id }}">
                                    @php
                                        $newComment = new \App\Models\Comments();
                                        $comments = $newComment->getAllCommentByPostId($post->post_id);

                                        // dd($comments);

                                    @endphp
                                    @foreach ($comments as $comment)
                                        <div class="item-comment">
                                            <img src="{{ $comment->profile_pic_url == null ? asset('images/none-avatar.jpg') : $comment->profile_pic_url }}"
                                                alt="Avatar" class="img-fluid rounded-circle"
                                                style="width: 40px; height: 40px; object-fit: cover;">
                                            <div class="content-comment">
                                                <p class="username-comment">{{ $comment->username }}</p>
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div id="commentForm{{ $post->post_id }}" class="text-comment"
                                    data-post-id="{{ $post->post_id }}">
                                    @csrf
                                    <img src="{{ $userCurrent->profile_pic_url == null ? asset('images/none-avatar.jpg') : $userCurrent->profile_pic_url }}"
                                        alt="Avatar" class="img-fluid rounded-circle me-2"
                                        style="width: 40px; height: 40px;">
                                    <input type="text" name="comment" id="input-comment"
                                        placeholder=" Bình luận..." style="width: 100%; height:30px;">
                                    <input type="hidden" name="post-id" value="{{ $post->post_id }}">
                                    <button type="button" class="submit-comment">➤</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    const defaultAvatar = "{{ asset('images/none-avatar.jpg') }}";
</script>
<script src="{{ asset('js/home.js') }}"></script>
</body>

</html>
