<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&amp;display=swap" rel="stylesheet">
    <!--Box-Icons-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" type="text/css" rel="stylesheet">
    <!--My CSS-->
    <link href="assets/css/Style.css" type="text/css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            // Function to get the initial like count and check if the user has liked the photo
            function getLikeStatusAndCount(fotoId) {
                var checkLikeUrl = "/foto/checklike/" + fotoId;
                var getLikeCountUrl = "/foto/get-like-count/" + fotoId;

                // Get the initial like status
                $.ajax({
                    url: checkLikeUrl,
                    method: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token in headers
                    },
                    success: function(response) {
                        // Update like icon based on whether the user has liked the photo
                        $('#likeIcon[data-foto-idnya="' + fotoId + '"]').toggleClass('bxs-heart',
                            response.liked);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

                // Get and update the like count
                $.ajax({
                    url: getLikeCountUrl,
                    method: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token in headers
                    },
                    success: function(response) {
                        // Update like count
                        $('#likeCount[data-foto-idnya="' + fotoId + '"] span').text(response
                            .like_count); // Update the inner span text
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Trigger like status and count retrieval for each like icon on page load
            $('.like-icon').each(function() {
                var fotoId = $(this).data('foto-idnya');
                getLikeStatusAndCount(fotoId);
            });

            // Click event handler for toggling like/unlike
            $('.like-icon').click(function() {
                var fotoId = $(this).data('foto-idnya');
                var likeUrl = "/foto/like/" + fotoId;
                var unlikeUrl = "/foto/unlike/" + fotoId;
                var checkLikeUrl = "/foto/checklike/" + fotoId;

                // Check current like status and toggle like/unlike
                $.ajax({
                    url: checkLikeUrl,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.liked) {
                            // Unlike the photo
                            $.ajax({
                                url: unlikeUrl,
                                method: 'DELETE',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token in headers
                                },
                                success: function(response) {
                                    // Update like icon
                                    $('#likeIcon[data-foto-idnya="' + fotoId + '"]')
                                        .removeClass('bxs-heart').addClass(
                                            'bx-heart');
                                    // Update like count
                                    $('#likeCount[data-foto-idnya="' + fotoId +
                                        '"]').text(response.like_count);
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                }
                            });
                        } else {
                            // Like the photo
                            $.ajax({
                                url: likeUrl,
                                method: 'POST',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token in headers
                                },
                                success: function(response) {
                                    // Update like icon
                                    $('#likeIcon[data-foto-idnya="' + fotoId + '"]')
                                        .addClass('bxs-heart').removeClass(
                                            'bx-heart');
                                    // Update like count
                                    $('#likeCount[data-foto-idnya="' + fotoId +
                                        '"]').text(response.like_count);
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</head>

<body>
    @include('layout.nav')
    <div class="create-post hide">
        {{-- <form action="{{ route('fotos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="posting-container">
                <div>
                    <input name="judul_foto" type="text" placeholder="Judul Post" class="post-content">
                    @error('judul_foto')
                        <div class="input-group has-validation"
                            style="color: red; font-family: 'Cairo', sans-serif; font-size: 15px;">
                            {{ $message }}
                        </div>
                    @enderror

                    <input name="deskripsi_foto" type="text" placeholder="Deskripsi Post" class="post-content">
                    @error('deskripsi_foto')
                        <div class="input-group has-validation"
                            style="color: red; font-family: 'Cairo', sans-serif; font-size: 15px;">
                            {{ $message }}
                        </div>
                    @enderror
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Pilih Album</option>
                        @foreach ($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
                        @endforeach
                      </select>  
                    <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="">
                </div>

                <div>
                    @error('lokasi_file')
                        <div class="input-group has-validation"
                            style="color: red; font-family: 'Cairo', sans-serif; font-size: 15px;">
                            {{ $message }}
                        </div>
                    @enderror

                    <input type="file" id="media" name="lokasi_file" accept="image/jpeg, image/png, image/gif"
                        class="hide choose-media">
                    <label for="media" class="add-media"><i class='bx bxs-image-alt'></i>Add Media</label>
                    <button type="submit" class="posting">Post</button>
                </div>
            </div>
        </form> --}}
    </div>

    <section class="main .container">
        <!-- resources/views/fotos/index.blade.php -->

        @foreach ($fotos as $foto)
            <div class="post-container">
                <div class="post">
                    <div class="post-header">
                        @if ($foto->user)
                            <img src="{{ Avatar::create($foto->user->name)->toBase64() }}" alt="">
                            <p class="username" style="font-size: 17px; margin-top: 10px;"><span>@</span>{{ $foto->user->name }}</p>
                        @endif
                    </div>
                    <div class="post-feed">
                        <div class="post-img-container">
                            <img src="{{ Storage::url($foto->lokasi_file) }}" alt="foto">
                        </div>
                    </div>
                    <div class="post-details">
                        <div class="details">
                            <i class='bx bx-heart like-icon' id="likeIcon" data-foto-idnya="{{ $foto->id }}"></i>
                            {{-- <i class='bx bx-bookmark'></i> --}}
                            @if (Auth::check() && $foto->user_id == Auth::user()->id)
                                <a href="{{ route('foto.edit', $foto->id) }}"><i class='bx bx-pencil'></i></a>
                            @endif
                            @if (Auth::check() && $foto->user_id == Auth::user()->id)
                                <a href="#" onclick="deleteFoto({{ $foto->id }})"><i class='bx bxs-trash'
                                        style="color: red;"></i></a>
                            @endif
                            <span class="likes" id="likeCount">{{ $foto->like_count }} likes</span>
                        </div>
                        <p class="post-judul">{{ $foto->judul_foto }}</p>
                        <p class="post-desc">{{ $foto->deskripsi_foto }}</p>
                        <div class="comments-container">
                            @if($foto->komentars)
                            @foreach($foto->komentars as $komentar)
                            <div class="comments">
                                @if($komentar->user)
                                <img src="{{ Avatar::create($komentar->user->name)->toBase64() }}" alt="">
                                @endif
                                <p class="comment-content" style="text-align: center">{{ $komentar->isi_komentar }}</p>
                                <div>
                                {{-- <i class="bx bx-heart like-comment"></i> --}}
                                @if (Auth::check() && $komentar->user_id == Auth::user()->id)
                                <form action="{{ route('komentar.destroy', $komentar->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; cursor: pointer;"><i class="bx bxs-trash-alt delete-comment"></i></button>
                                </form>
                                @endif
                                </div>
                               </div>
                            @endforeach
                            @endif   
                        </div>
                        <form action="{{ route('komentar.store') }}" method="post">
                            @csrf
                            <div class="comment-box">
                                <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                            <input type="text" placeholder="Add a comment" class="comment-input" name="isi_komentar">
                            <button class="add-comment-btn" type="submit"><i class='bx bx-message-rounded-dots comment-icon'></i></button>
                            {{-- <span class="comment-count"><span>0</span> comment</span> --}}
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <script>
            function deleteFoto(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to delete route
                        window.location = "{{ url('foto/delete') }}/" + id;
                    }
                })
            }
        </script>


        {{-- <div class="post">
                    <div class="post-header">
                        <img src="assets/images/user3.png" alt="">
                        <p class="username">@jackson888</p>
                    </div>
                    <div class="post-feed">
                        <div class="post-overlays">
                            <img src="assets/images/icon/red-heart.png" alt="">
                        </div>
                        <div class="share-window">
                            <h1>Share the post with other</h1>
                            <div class="share-link-container">
                                <input type="text" placeholder="https://www.SocialApp.com/user/posts/45@cdr" disabled>
                                <button>Copy</button>
                            </div>
                        </div>
                        <div class="post-img-container">
                            <img src="assets/images/posts/post2.png" alt="">
                            <img src="assets/images/posts/post3.png" alt="">
                            <img src="assets/images/posts/post4.png" alt="">
                            <img src="assets/images/posts/post5.png" alt="">
                        </div>
                    </div>
                    <div class="post-details">
                        <div class="details">
                            <i class='bx bx-heart like-icon'></i>
                            <i class='bx bx-share share-icon'></i>
                            <span class="likes"><span>300</span> likes</span>
                        </div>
                        <p class="post-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti, distinctio sit doloribu.</p>
                        <div class="comments-container">
                        </div>
                        <div class="comment-box">
                             <input type="text" placeholder="Add a comment" class="comment-input">
                             <button class="add-comment-btn"><i class='bx bx-message-rounded-dots comment-icon'></i></button>
                             <span class="comment-count"><span>0</span> comment</span>
                        </div>
                    </div>
                </div>

                <div class="post">
                    <div class="post-header">
                        <img src="assets/images/user4.png" alt="">
                        <p class="username">@peter888</p>
                    </div>
                    <div class="post-feed">
                        <div class="post-overlays">
                            <img src="assets/images/icon/red-heart.png" alt="">
                        </div>
                        <div class="share-window">
                            <h1>Share the post with other</h1>
                            <div class="share-link-container">
                                <input type="text" placeholder="https://www.SocialApp.com/user/posts/45@cdr" disabled>
                                <button>Copy</button>
                            </div>
                        </div>
                        <div class="post-img-container">
                            <img src="assets/images/posts/post3.png" alt="">
                            <img src="assets/images/posts/post4.png" alt="">
                            <img src="assets/images/posts/post5.png" alt="">
                        </div>
                    </div>
                    <div class="post-details">
                        <div class="details">
                            <i class='bx bx-heart like-icon'></i>
                            <i class='bx bx-share share-icon'></i>
                            <span class="likes"><span>300</span> likes</span>
                        </div>
                        <p class="post-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti, distinctio sit doloribu.</p>
                        <div class="comments-container">
                        </div>
                        <div class="comment-box">
                             <input type="text" placeholder="Add a comment" class="comment-input">
                             <button class="add-comment-btn"><i class='bx bx-message-rounded-dots comment-icon'></i></button>
                             <span class="comment-count"><span>0</span> comment</span>
                        </div>
                    </div>
                </div> --}}

        </div>

        {{-- <div class="user-about-section" class="container">
                <div class="user-info">
                    <img src="{{ Avatar::create(Auth::user()->name)->toBase64(); }}" class="user-dp" alt="">
                    <div class="info-container">
                        <h1>{{ Auth::user()->name}}</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti, distinctio sit doloribu.</p>
                    </div>
                </div>
                <h1 class="suggestions-heading">Suggestions</h1>
                <div class="suggestions-container">
                    <div class="user-card">
                        <img src="assets/images/boyot.jpg" alt="">
                        <p>Arra</p>
                        <button class="follow-btn">Follow</button>
                    </div>
                    <div class="user-card">
                        <img src="assets/images/fariz.jpg" alt="">
                        <p>Fariz</p>
                        <button class="follow-btn">Follow</button>
                    </div>
                    <div class="user-card">
                        <img src="assets/images/mahesa.jpg" alt="">
                        <p>Mahesa</p>
                        <button class="follow-btn">Follow</button>
                    </div>
                    <div class="user-card">
                        <img src="assets/images/saady.jpg" alt="">
                        <p>Saady</p>
                        <button class="follow-btn">Follow</button>
                    </div>
                </div>
            </div> --}}

    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/myScript.js"></script>
</body>

</html>
