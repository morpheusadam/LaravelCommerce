<div class="top-section fullscreen-container">
    <img src="{{ asset('frontend/theme1/assets/img/banner_img/bg_top.jpg')}}" class="h-100">
</div>
<!--start mobile header -->
<nav class="navbar direction-ltr fixed-top header-responsive">
    <div class="container">
        <div class="navbar-translate">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            <div class="search-nav default">
                <form action="#">
                    <input type="text" placeholder="جستجو ...">
                    <button type="submit"><img src="{{ asset('frontend/theme1/assets/img/search.png')}}" alt=""></button>
                </form>
                <ul>
                    <li><a href="#"><i class="fa fa-user-large colormain" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-cart-arrow-down colormain" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <div class="logo-nav-res default text-center">
                <a href="#">
                    <img src="{{ asset('frontend/theme1/assets/img/logo.png')}}"  alt="">
                </a>
            </div>
            <ul class="navbar-nav default">
                @php
                    $categories = Helper::getAllCategory();
                @endphp
                @if(is_array($categories) || is_object($categories))
                    @foreach($categories as $cat)
                    <li>
                        <a href="#">  {{$cat->title}}</a>
                    </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- end mobile header -->
<div class="wrapper default">
    <!--start pc header -->
    <header class="Masai-header default">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                    <div class="logo-area default">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('frontend/theme1/assets/img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-5 col-sm-8 col-7">
                    <div class="search-area default">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <select>
                                    <option>همه دسته‌بندی‌ها</option>
                                    @if(is_array($categories) || is_object($categories))
                                        @foreach($categories as $cat)
                                            <option>{{$cat->title}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <form method="POST" action="{{ route('product.search') }}" class="search">
                                    @csrf
                                    <input name="search" placeholder="جستجو" type="search">
                                    <button type="submit"><img src="{{ asset('frontend/theme1/assets/img/search.png')}}" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12">
                    <div class="user_head">
                        <a href="{{ route('login.form') }}" class="iconhead">
                            <i class="fa fa-user-large font-20" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="cart dropdown masai_dropdown">
                        <span class="divider"></span>
                        <a href="{{ route('cart') }}" class="dropdown-toggle iconhead" data-toggle="dropdown" id="navbar_a">
                            <i class="fa fa-cart-arrow-down font-20" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbar_a">
                            <ul class="m_cart-list">
                                @php
                                    $cartItems = Helper::getAllProductFromCart();
                                @endphp
                                @if(is_array($cartItems) || is_object($cartItems))
                                    @foreach($cartItems as $data)
                                        @php
                                            $photo = explode(',', $data->product['photo']);
                                        @endphp
                                        <li class="m_cart_li1">
                                            <a href="{{ route('product-detail', $data->product['slug']) }}" class="m_cart-item">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                <div class="m_cart-item-content">
                                                    <div class="m_cart-item-image">
                                                        <img src="{{ $photo[0] }}" />
                                                    </div>
                                                    <div class="m_cart-item-details">
                                                        <div class="m_cart-item-title">
                                                            {{ $data->product['title'] }}
                                                        </div>
                                                        <div class="m_cart-item-params">
                                                            <div class="m_cart-item-props">
                                                                <span>تعداد : {{ $data->quantity }}</span>
                                                                <span>رنگ: {{ $data->product['color'] }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <div class="m_cart-header">
                                <div class="m_cart-total">
                                    <span>مجموع سبد:</span>
                                    <span>{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                                    <span> تومان</span>
                                </div>
                            </div>
                            <div class="btn_cart">
                                <a href="{{ route('cart') }}" class="btn btn_sabad">مشاهده سبد</a>
                                <a href="{{ route('checkout') }}" class="btn btn_pardakht btn-main-masai">پرداخت</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="nav_header">
            <ul class="nav__ullist">
                <li class="list_style">
                    <i class="fa fa-bars icon-icon" aria-hidden="true"></i><a href="#" class="list__link">دسته بندی کالاها</a>
                    <div class="submeno">
                        <ul class="main_meno-drobdown">
                            <li class="child_mno-drobdown">
                                @if(is_array($categories) || is_object($categories))
                                    @foreach($categories as $cat)
                                        <a href="#" class="run">  {{$cat->title}}    </a>
                                    @endforeach
                                @endif
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="list_style">
                    <i class="fa fa-film icon-icon" aria-hidden="true"></i><a href="#" class="list__link">دمو محصولات</a>
                </li>
                <li class="list_style">
                    <i class="fa fa-percent icon-icon" aria-hidden="true"></i><a href="#" class="list__link">تخفیفات و پیشنهادات</a>
                </li>
                <li class="list_style">
                    <i class="fa fa-user-secret icon-icon" aria-hidden="true"></i><a href="#" class="list__link">مَسای امن</a>
                </li>
                <li class="list_style">
                    <i class="fa fa-plus icon-icon" aria-hidden="true"></i><a href="#" class="list__link">مَسای پلاس</a>
                </li>
                <li class="list_style">
                    <i class="fa fa-link icon-icon" aria-hidden="true"></i><a href="#" class="list__link">مَسای کلاب</a>
                </li>
                <li class="list_style">
                    <i class="fa fa-handshake-o icon-icon icon-color-2" aria-hidden="true"></i><a href="#" class="list__link">مَسای پی</a>
                </li>
                <li class="list_style">
                    <a href="#" class="list__link">سوالی دارید؟</a>
                </li>
                <li class="list_style">
                    <a href="#" class="list__link">فروشنده شوید</a>
                </li>
                <ul class="nav_header-2">
                    <li class="list_style">
                        <i class="fa fa-map icon-icon" aria-hidden="true"></i>
                        <a href="order-address.html" class="list__link">انتخاب موقعیت</a>
                    </li>
                </ul>
            </ul>
        </nav>
    </header>
    <!-- end pc header -->
</div>