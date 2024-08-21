@extends('frontend.theme2.layouts.master')

@section('title','E-SHOP || PRODUCT PAGE')

@section('main-content')
<!-- main -->
<main class="search-page default space-top-30">
    <div class="container">
        <div class="row">
            <div class="col-12 hidden-xs">
                <div class="brand-slider card border_all">
                    <header class="card-header">
                        <h3 class="card-title"><span>دسته بندی ها</span></h3>
                    </header>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                @php
                                    $menu = App\Models\Category::getAllParentWithChild();
                                @endphp
                                @if($menu)
                                    @foreach($menu as $cat_info)
                                        <div class="col-6 col-md-2 contact-bigicon">
                                            <a href="{{ route('product-cat', $cat_info->slug) }}" target="_blank">
                                                <img class="img-responsive imgpad" src="assets/img/Masai/bigicon/img-1.png" alt="" />
                                                <b class="title-3 light-black">{{ $cat_info->title }}</b>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="sidebar-page col-12 col-sm-12 col-md-4 col-lg-3">
                <form action="{{route('shop.filter')}}" method="POST">
                    @csrf
                    <div class="box">
                        <header class="card-header">
                            <h3 class="card-title"><span class="space-right-10">قیمت</span></h3>
                        </header>
                        <div class="box-content space-40 space-right-25 space-left-25">
                            <div id="slider-range" data-min="0" data-max="{{ DB::table('products')->max('price') }}"></div>
                            <div class="product_filter">
                                <button type="submit" class="filter_button">Filter</button>
                                <div class="label-input">
                                    <span>Range:</span>
                                    <input style="" type="text" id="amount" readonly />
                                    <input type="hidden" name="price_range" id="price_range" value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <header class="card-header">
                            <h3 class="card-title"><span class="space-right-10">دسته بندی ها</span></h3>
                        </header>
                        <div class="box-content">
                            <ul class="categor-list">
                                @if($menu)
                                    @foreach($menu as $cat_info)
                                        <li>
                                            <a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
                                            @if($cat_info->child_cat->count() > 0)
                                                <ul>
                                                    @foreach($cat_info->child_cat as $sub_menu)
                                                        <li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="box">
                        <header class="card-header">
                            <h3 class="card-title"><span class="space-right-10">برندها</span></h3>
                        </header>
                        <div class="box-content">
                            <ul class="categor-list">
                                @php
                                    $brands = DB::table('brands')->orderBy('title', 'ASC')->where('status', 'active')->get();
                                @endphp
                                @foreach($brands as $brand)
                                    <li><a href="{{route('product-brand',$brand->slug)}}">{{$brand->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </form>
            </aside>
            <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                <div class="listing default">
                    <div class="listing-header default marg_all0">
                        <ul class="Search_list nav nav-tabs" role="tablist">
                            <li><a class="active" data-toggle="tab" href="#suggestion" role="tab" aria-expanded="false">پیشنهاد خریداران</a></li>
                            <li><a data-toggle="tab" href="#most-visited" role="tab" aria-expanded="false">پربازدیدترین</a></li>
                            <li><a data-toggle="tab" href="#delivery" role="tab" aria-expanded="true">سریع‌ترین ارسال</a></li>
                            <li><a data-toggle="tab" href="#most-seller" role="tab" aria-expanded="false">‌بیشترین فروش‌</a></li>
                            <li><a data-toggle="tab" href="#price" role="tab" aria-expanded="false">‌براساس قیمت</a></li>
                        </ul>
                    </div>
                    <div class="tab-content default text-center">
                        <div class="tab-pane active" id="suggestion" role="tabpanel" aria-expanded="true">
                            <div class="row listing-items">
                                @foreach($products as $product)
                                    @php
                                        $photos = explode(',', $product->photo);
                                    @endphp
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-12 list_search_p">
                                        <div class="product-box">
                                            <div class="product-seller-details product-seller-details-item-grid">
                                                <span class="search_prod_icon">
                                                    <i class="fa fa-search search_icon_search" aria-hidden="true"></i>
                                                    <i class="fa fa-heart search_icon_like" aria-hidden="true"></i>
                                                </span>
                                                <span class="search_prod_btn">
                                                    <i class="fa fa fa-cart-arrow-down search_icon_cart" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <a class="product-box-img" href="{{ route('product-detail', $product->slug) }}">
                                                @if (!empty($photos))
                                                    <img class="main_img_gallery" src="{{ $photos[0] }}" alt="{{ $product->title }}">
                                                @endif
                                                <ul>
                                                         <li class="color_pro" style="background-color:  ;top: 7px;"></li>
                                                 </ul>
                                            </a>
                                            <div class="product-box-content">
                                                <div class="product-box-content-row">
                                                    <div class="product_title">
                                                        <a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                                    </div>
                                                </div>
                                                <div class="product-box-row product_price_search">
                                                    <div class="price">
                                                        @if($product->discount)
                                                            <del><span>{{ number_format($product->price) }}<span>تومان</span></span></del>
                                                            <span class="discount_badge">{{ $product->discount }}%</span>
                                                            <ins><span>{{ number_format($product->price - ($product->price * $product->discount / 100)) }}<span>تومان</span></span></ins>
                                                        @else
                                                            <ins><span>{{ number_format($product->price) }}<span>تومان</span></span></ins>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Repeat similar structure for other tabs like #most-visited, #delivery, #most-seller, #price -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- main -->
@endsection