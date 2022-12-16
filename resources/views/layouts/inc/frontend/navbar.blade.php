<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <a href="/"><img src="{{asset('admin/images/logo.svg')}}" alt="" class="logo-svg"></a>
                </div>
                <div class="col-md-5 my-auto arear-search">
                    <form action="{{ url('search') }}" method="GET" role="search">
                        <div class="input-group search">
                            <input type="search" class="input-search" name="search" value="{{ Request::get('search') }}" placeholder="Search products...." />
                            <button class="search-btn" type="submit">
                                <svg width="1.6rem" height="1.6rem" viewBox="0 0 48 48" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M22 10C15.3726 10 10 15.3726 10 22C10 28.6274 15.3726 34 22 34C28.6274 34 34 28.6274 34 22C34 15.3726 28.6274 10 22 10ZM6 22C6 13.1634 13.1634 6 22 6C30.8366 6 38 13.1634 38 22C38 25.6974 36.7458 29.1019 34.6397 31.8113L43.3809 40.5565C43.7712 40.947 43.7712 41.5801 43.3807 41.9705L41.9665 43.3847C41.5759 43.7753 40.9426 43.7752 40.5521 43.3846L31.8113 34.6397C29.1019 36.7458 25.6974 38 22 38C13.1634 38 6 30.8366 6 22Z"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('cart') }}" style="position: relative">
                                <i class="fa fa-shopping-cart fa-icon"></i> Cart <livewire:frontend.cart.cart-count/>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('wishlist') }} " style="position: relative">
                                <i class="fa fa-heart fa-icon"></i> Wishlist
                                <livewire:frontend.wishlist-count />
                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user fa-icon"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('profile') }}">
                                            <i class="fa-solid fa-id-card fa-icon"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('orders') }}">
                                            <i class="fa-solid fa-money-check-dollar fa-icon"></i> My Orders
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('wishlist') }}">
                                            <i class="fa fa-heart fa-icon"></i>My Wishlist
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ url('cart') }}"><i class="fa fa-shopping-cart fa-icon"></i> My
                                            Cart</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out fa-icon"></i>
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                Funda Ecom
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="fa-solid fa-house icon-margin"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections') }}">
                            <i class="fa-solid fa-bars-staggered icon-margin"></i>All Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/new-arrivals') }}">
                            <i class="fa-regular fa-newspaper icon-margin"></i>New Arrivals
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/featured-products') }}">
                            <i class="fa-brands fa-sellsy icon-margin"></i>Featured Products
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
