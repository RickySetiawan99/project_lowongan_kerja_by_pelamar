<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="#">
                            {{-- <img src="assets/img/logo.png" alt=""> --}}
                            LOGO
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="{{ Route::is('home.*') ? 'current-list-item' : '' }}">
                                <a href="{{ route('home.index') }}">Home</a>
                            </li>
                            <li class="{{ Route::is('lowongan.*') ? 'current-list-item' : '' }}">
                                <a href="{{ route('lowongan.index') }}">Lowongan</a>
                            </li>
                            <li class="{{ Route::is('news.*') ? 'current-list-item' : '' }}">
                                <a href="{{ route('news.index') }}">News</a>
                            </li>
                            <li class="{{ Route::is('about.index') ? 'current-list-item' : '' }}">
                                <a href="{{ route('about.index') }}">About</a>
                            </li>
                            <li class="{{ Route::is('contact.index') ? 'current-list-item' : '' }}">
                                <a href="{{ route('contact.index') }}">Contact</a>
                            </li>
                            <li>
                                {{-- <div class="header-icons">
                                    <a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                </div> --}}
                            </li>
                        </ul>
                    </nav>
                    {{-- <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div> --}}
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->