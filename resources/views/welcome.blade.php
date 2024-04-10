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
    </head>

    <body>
        <header class="container">
            <nav>
               <img src="assets/images/social-media.png" alt="logo">
               <form action="" class="search-box">
                   <input class="search-input" type="text" placeholder="Search">
                   <button class="search-btn"><i class="bx bx-search"></i></button>
               </form>
               <div class="links">
                <a href="#" class="link"><i class='bx bxs-home'></i></a>
                <div class="activity-log">
                    <a href="#" class="link"><i class='bx bx-heart heart-icon' ></i></a>
                    <div class="activity-container hide">
                        <div class="activity-card">
                            <img src="assets/images/posts/post4.png" alt="" class="user-img">
                            <p class="activity"><b>@siri999</b> liked your post</p>
                            <img src="assets/images/posts/post1.png" alt="" class="activity-post">
                        </div>
                        <div class="activity-card">
                            <img src="assets/images/user2.png" alt="" class="user-img">
                            <p class="activity"><b>@Michael888</b> liked your post</p>
                            <img src="assets/images/posts/post1.png" alt="" class="activity-post">
                        </div>
                        <div class="activity-card">
                            <img src="assets/images/user3.png" alt="" class="user-img">
                            <p class="activity"><b>@jackson888</b> liked your post</p>
                            <img src="assets/images/posts/post1.png" alt="" class="activity-post">
                        </div>
                        <div class="activity-card">
                            <img src="assets/images/user4.png" alt="" class="user-img">
                            <p class="activity"><b>@peter888</b> liked your post</p>
                            <img src="assets/images/posts/post1.png" alt="" class="activity-post">
                        </div>
                    </div>
                </div>
                <a href="#" class="link"><i class='bx bx-plus-circle post-icon'></i></a>
                <a href="#" class="link"><img src="assets/images/gw.jpg" alt=""></i></a>
            </div>
            </nav>
        </header>

        <div class="create-post hide">
            <div class="posting-container">
                <div>
                    <img src="assets/images/gw.jpg" alt="">
                    <input type="text" placeholder="Start a post" class="post-content">
                </div>
                <div>
                    <input type="file" id="media" name="image" accept="assets/images/" class="hide choose-media">
                    <label for="media" class="add-media"><i class='bx bxs-image-alt'></i>Add Media</label>
                   <button class="posting">Post</button>
                </div>
            </div>
        </div>

        <section class="main .container">
            <div class="post-container">
                <!---->
                <div class="post">
                    <div class="post-header">
                        <img src="assets/images/gw.jpg" alt="">
                        <p class="username">@IkySukses2024</p>
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
                            <img src="assets/images/posts/post1.png" alt="">
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
                <!---->
                <div class="post">
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
                <!---->
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
                </div>
                <!---->
            </div>

            <div class="user-about-section" class="container">
                <div class="user-info">
                    <img src="assets/images/gw.jpg" class="user-dp" alt="">
                    <div class="info-container">
                        <h1>{{ Auth::user()->name }}</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti, distinctio sit doloribu.</p>{{-- buat deskripsi si user ( bisa di edit) --}}
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
            </div>

        </section>

        
        

        <script src="assets/js/myScript.js"></script>
    </body>

</html>
