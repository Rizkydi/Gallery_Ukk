<header class="containe">
    <nav>
       <img src="assets/images/social-media.png" alt="logo">
       {{-- <form action="" class="search-box">
           <input class="search-input" type="text" placeholder="Search">
           <button class="search-btn"><i class="bx bx-search"></i></button>
       </form> --}}
       <div class="links">
        <a href="#" class="link"><i class='bx bxs-home'></i></a>
        <div class="activity-log">
            <a href="{{ route('createalbum') }}" class="link"><i class='bx bx-heart heart-icon' ></i></a>
        </div>
        <a href="{{ route('formfoto') }}" class="link"><i class='bx bx-plus-circle post-icon'></i></a>
        <a href="#" class="link"><img src="{{ Avatar::create(Auth::user()->name)->toBase64(); }}" alt="" onclick="toggleMenu()" style="margin-bottom: 10px;"></i></a>
    </div>
    <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <div class="user-info">
                <img src="{{ Avatar::create(Auth::user()->name)->toBase64(); }}" alt="">
                <h2>{{ Auth::user()->name}}</h2>
            </div>
            <hr>

            <a href="{{ route('userprofile') }}" class="sub-menu-link">
                <i class='bx bx-user'></i>
                <p>Profile</p>
                <span>></span>
            </a>
            <a href="{{ route('detailprofile') }}" class="sub-menu-link">
                <i class='bx bxs-cog'></i>
                <p>Edit Profile</p>
                <span>></span>
            </a>
            <a href="{{ route('logout') }}" class="sub-menu-link">
                <i class='bx bx-log-out'></i>
                <p>Logout</p>
                <span>></span>
            </a>

        </div>
    </div>
    </nav>
</header>