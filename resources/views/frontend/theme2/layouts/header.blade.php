<div class="top-section fullscreen-container">
    <img src="{{ asset('frontend/theme1/assets/img/banner_img/bg_top.jpg') }}" class="h-100">
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
                    <button type="submit"><img src="{{ asset('frontend/theme1/assets/img/search.png') }}"
                            alt=""></button>
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
                    <img src="{{ asset('frontend/theme1/assets/img/logo.png') }}" alt="">
                </a>
            </div>
            <ul class="navbar-nav default">
                @php
                    $categories = Helper::getAllCategory();
                @endphp
                @if (is_array($categories) || is_object($categories))
                    @foreach ($categories as $cat)
                        <li>
                            <a href="{{ route('product-cat', $cat->slug) }}"> {{ $cat->title }}</a>

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
                            <img src="{{ asset('frontend/theme1/assets/img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-5 col-sm-8 col-7">
                    <div class="search-area default">
                        <div class="search-bar-top">
                            <div class="search-bar">
                               


                                <form method="POST" action="{{ route('product.search') }}" class="search">
                                    @csrf
                                    <input name="search" placeholder="جستجو" type="search">
                                    <button type="submit"><img
                                            src="{{ asset('frontend/theme1/assets/img/search.png') }}"
                                            alt=""></button>
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
                        <a href="{{ route('cart') }}" class="dropdown-toggle iconhead" data-toggle="dropdown"
                            id="navbar_a">
                            <i class="fa fa-cart-arrow-down font-20" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbar_a">
                            <ul class="m_cart-list">
                                @php
                                    $cartItems = Helper::getAllProductFromCart();
                                @endphp
                                @if (is_array($cartItems) || is_object($cartItems))
                                    @foreach ($cartItems as $data)
                                        @php
                                            $photo = explode(',', $data->product['photo']);
                                        @endphp
                                        <li class="m_cart_li1">
                                            <a href="{{ route('product-detail', $data->product['slug']) }}"
                                                class="m_cart-item">
                                                <form action="{{ route('cart-delete', $data->id) }}" method="GET"
                                                    style="display:inline;">
                                                    @csrf
                                                    <button type="submit"
                                                        style="background:none; border:none; padding:0; cursor:pointer;">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                </form>
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
                    <i class="fa fa-bars icon-icon" aria-hidden="true"></i><a href="#" class="list__link">دسته
                        بندی کالاها</a>
















                    <div class="submeno">
                        <ul class="main_meno-drobdown">
                            {!! Helper::getHeaderCategory() !!}
                        </ul>
                    </div>

                    <style>
                        /* CSS برای نمایش منوهای تو در تو */
                        .main_meno-drobdown {
                            list-style: none;
                            padding: 0;
                            margin: 0;
                        }

                        .child_mno-drobdown {
                            position: relative;
                        }

                        .child_mno-drobdown>.dropdown-menu {
                            display: none;
                            position: absolute;
                            top: 0;
                            right: 100%;
                            /* تغییر از left به right برای نمایش زیر منوها در سمت چپ */
                            list-style: none;
                            padding: 0;
                            margin: 0;
                            background-color: #fff;
                            border: 1px solid #ccc;
                            z-index: 1000;
                            /* اضافه کردن z-index برای اطمینان از نمایش صحیح */
                        }

                        .child_mno-drobdown:hover>.dropdown-menu {
                            display: block;
                        }
                    </style>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var dropdowns = document.querySelectorAll('.child_mno-drobdown');

                            dropdowns.forEach(function(dropdown) {
                                dropdown.addEventListener('mouseenter', function() {
                                    var submenu = this.querySelector('.dropdown-menu');
                                    if (submenu) {
                                        submenu.style.display = 'block';
                                    }
                                });

                                dropdown.addEventListener('mouseleave', function() {
                                    var submenu = this.querySelector('.dropdown-menu');
                                    if (submenu) {
                                        submenu.style.display = 'none';
                                    }
                                });
                            });
                        });
                    </script>


                </li>





                <li class="list_style {{ Request::path() == 'home' ? 'active' : '' }}">
                    <i class="fa fa-home icon-icon" aria-hidden="true"></i><a href="{{ route('home') }}"
                        class="list__link">خانه</a>
                </li>
                <li class="list_style {{ Request::path() == 'product-grids' ? 'active' : '' }}">
                    <i class="fa fa-home icon-icon" aria-hidden="true"></i><a href="{{ route('product-grids') }}"
                        class="list__link">فروشگاه</a>
                </li>
                <li class="list_style {{ Request::path() == 'about-us' ? 'active' : '' }}">
                    <i class="fa fa-info-circle icon-icon" aria-hidden="true"></i><a href="{{ route('about-us') }}"
                        class="list__link">درباره ما</a>
                </li>
                <li class="list_style {{ Request::path() == 'blog' ? 'active' : '' }}">
                    <i class="fa fa-blog icon-icon" aria-hidden="true"></i><a href="{{ route('blog') }}"
                        class="list__link">بلاگ</a>
                </li>
                <li class="list_style {{ Request::path() == 'contact' ? 'active' : '' }}">
                    <i class="fa fa-phone icon-icon" aria-hidden="true"></i><a href="{{ route('contact') }}"
                        class="list__link">تماس با ما</a>
                </li>


            </ul>
        </nav>
    </header>
    <!-- end pc header -->
</div>
