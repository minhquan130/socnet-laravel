    @include('layouts.header')
    <div class="profile">
        <div class="profile-left">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="info-card">
                <div class="info-head">
                    <h4>Thông tin người dùng</h4>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="z-index: 10">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
                <div class="info">
                    <span>
                        <b>Tên người dùng: </b>
                    </span>
                    <span>{{ $userCurrent->username }}</span>
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
                    <span></span>
                </div>
                <div class="info">
                    <span>
                        <b>Làm việc ở: </b>
                        <span></span>
                    </span>
                </div>
                <div class="info">
                    <span>
                        <b>Tình trạng: </b>
                        <span></span>
                    </span>
                </div>
                <div class="info">
                    <span>
                        <b>Tiểu sử: </b>
                        <span></span>
                    </span>
                </div>
                <div class="info">
                    <span>
                        <b>Giới tính: </b>
                        <span></span>
                    </span>
                </div>
                <div class="info">
                    <span>
                        <b>Ngày sinh: </b>
                        <span>{{ $userCurrent->date_of_birth }}</span>
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
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="edit">
                                <label class="edit-avatar">
                                    <img src="{{ $userCurrent->profile_pic_url == null ? asset('images/none-avatar.jpg') :  $userCurrent->profile_pic_url }}" alt="">
                                    <input type="file" name="avatar" id="avatar" accept="image/*" style="display: none">
                                </label>
                                <div class="edit-name">
                                    <span>Tên người dùng</span>
                                    <input type="text" name="user-name" id="name" placeholder="Nhập tên của bạn" value="{{ old('user_name', $userCurrent->username) }}">
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
                                <div class="edit-bio">
                                    <span>Tiểu sử</span>
                                    <input type="text" name="bio" id="bio" placeholder="Nhập tiểu sử">
                                </div>
                                <div class="edit-gender">
                                    <span>Giới tính</span>
                                    <select name="gender" id="gender">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                        <option value="3">Giới tính khác</option>
                                    </select>
                                </div>
                                <div class="edit-date">
                                    <span>Ngày sinh</span>
                                    <input type="date" name="date_of_birth" id="date_of_birth">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="profile-container">
            <div class="profile-right">
                <div class="avatar">
                    <img src="{{ $userCurrent->profile_pic_url == null ? asset('images/none-avatar.jpg') :  $userCurrent->profile_pic_url }}" alt="">
                </div>
                <div class="info-right">
                    <span>{{ $userCurrent->username }}</span>
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
    </div>
    <script>
        // Thay đổi ảnh trong modal khi chọn ảnh mới
        document.getElementById('avatar').onchange = function(event) {
            let reader = new FileReader();
            reader.onload = function() {
                document.querySelector('.edit-avatar img').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

    </script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>