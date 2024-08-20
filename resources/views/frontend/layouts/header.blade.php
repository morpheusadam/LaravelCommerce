<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            @php
                                $settings = DB::table('settings')->get();
                            @endphp
                            <li><i class="ti-headphone-alt"></i>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
                            <li><i class="ti-email"></i>@foreach($settings as $data) {{$data->email}} @endforeach</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin"></i> <a href="{{route('order.track')}}">پیگیری سفارش</a></li>
                            @auth
                                @if(Auth::user()->role == 'admin')
                                    <li><i class="ti-user"></i> <a href="{{route('admin')}}" target="_blank">داشبورد</a></li>
                                @else
                                    <li><i class="ti-user"></i> <a href="{{route('user')}}" target="_blank">داشبورد</a></li>
                                @endif
                                <li><i class="ti-power-off"></i> <a href="{{route('user.logout')}}">خروج</a></li>
                            @else
                                <li><i class="ti-power-off"></i><a href="{{route('login.form')}}">ورود /</a> <a href="{{route('register.form')}}">ثبت نام</a></li>
                            @endauth
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="لوگو"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="جستجو کنید..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option>همه دسته‌بندی‌ها</option>
                                @foreach(Helper::getAllCategory() as $cat)
                                    <option>{{$cat->title}}</option>
                                @endforeach
                            </select>
                            <form method="POST" action="{{route('product.search')}}">
                                @csrf
                                <input name="search" placeholder="جستجوی محصولات..." type="search">
                                <button class="btnn" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Wishlist -->
                        <div class="sinlge-bar shopping">
                            @php
                                $total_prod = 0;
                                $total_amount = 0;
                            @endphp
                            @if(session('wishlist'))
                                @foreach(session('wishlist') as $wishlist_items)
                                    @php
                                        $total_prod += $wishlist_items['quantity'];
                                        $total_amount += $wishlist_items['amount'];
                                    @endphp
                                @endforeach
                            @endif
                            <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>
                            <!-- Wishlist Items -->
                            @auth
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Helper::getAllProductFromWishlist())}} آیتم</span>
                                        <a href="{{route('wishlist')}}">مشاهده لیست علاقه‌مندی‌ها</a>
                                    </div>
                                    <ul class="shopping-list">
                                        @foreach(Helper::getAllProductFromWishlist() as $data)
                                            @php
                                                $photo = explode(',', $data->product['photo']);
                                            @endphp
                                            <li>
                                                <a href="{{route('wishlist-delete', $data->id)}}" class="remove" title="حذف این آیتم"><i class="fa fa-remove"></i></a>
                                                <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                <h4><a href="{{route('product-detail', $data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                                <p class="quantity">{{$data->quantity}} x - <span class="amount">{{number_format($data->price, 2)}} تومان</span></p>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>مجموع</span>
                                            <span class="total-amount">{{number_format(Helper::totalWishlistPrice(), 2)}} تومان</span>
                                        </div>
                                        <a href="{{route('cart')}}" class="btn animate">سبد خرید</a>
                                    </div>
                                </div>
                            @endauth
                            <!--/ End Wishlist Items -->
                        </div>
                        <!-- Cart -->
                        <div class="sinlge-bar shopping">
                            <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                            <!-- Cart Items -->
                            @auth
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Helper::getAllProductFromCart())}} آیتم</span>
                                        <a href="{{route('cart')}}">مشاهده سبد خرید</a>
                                    </div>
                                    <ul class="shopping-list">
                                        @foreach(Helper::getAllProductFromCart() as $data)
                                            @php
                                                $photo = explode(',', $data->product['photo']);
                                            @endphp
                                            <li>
                                                <a href="{{route('cart-delete', $data->id)}}" class="remove" title="حذف این آیتم"><i class="fa fa-remove"></i></a>
                                                <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                <h4><a href="{{route('product-detail', $data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                                <p class="quantity">{{$data->quantity}} x - <span class="amount">{{number_format($data->price, 2)}} تومان</span></p>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>مجموع</span>
                                            <span class="total-amount">{{number_format(Helper::totalCartPrice(), 2)}} تومان</span>
                                        </div>
                                        <a href="{{route('checkout')}}" class="btn animate">تسویه حساب</a>
                                    </div>
                                </div>
                            @endauth
                            <!--/ End Cart Items -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{Request::path() == 'home' ? 'active' : ''}}"><a href="{{route('home')}}">خانه</a></li>
                                            <li class="{{Request::path() == 'about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">درباره ما</a></li>
                                            <li class="@if(Request::path() == 'product-grids' || Request::path() == 'product-lists') active @endif"><a href="{{route('product-grids')}}">محصولات</a><span class="new">جدید</span></li>
                                            {{Helper::getHeaderCategory()}}
                                            <li class="{{Request::path() == 'blog' ? 'active' : ''}}"><a href="{{route('blog')}}">بلاگ</a></li>
                                            <li class="{{Request::path() == 'contact' ? 'active' : ''}}"><a href="{{route('contact')}}">تماس با ما</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>