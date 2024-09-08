@extends('frontend.theme2.layouts.master')

@section('title','تک اسپورت || فروشگاه ')

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
                                                <div class="circle-icon"> <!-- Add a div for circular icon -->
                                                    <img class="img-responsive imgpad" src="{{ $cat_info->photo }}" alt="" />
                                                    
                                                </div>
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
                            <div class="product_filter">
                                <div class="label-input">
                                    <span> رنج قیمت </span>
                                    <div>
                                        <input type="radio" id="price1" name="price_range" value="1-5000000" @if(!empty($_GET['price']) && $_GET['price'] == '1-5000000') checked @endif>
                                        <label for="price1">1 تا 5 میلیون</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="price2" name="price_range" value="5000000-10000000" @if(!empty($_GET['price']) && $_GET['price'] == '5000000-10000000') checked @endif>
                                        <label for="price2">5 تا 10 میلیون</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="price3" name="price_range" value="10000000-15000000" @if(!empty($_GET['price']) && $_GET['price'] == '10000000-15000000') checked @endif>
                                        <label for="price3">10 تا 15 میلیون</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="price4" name="price_range" value="15000000-30000000" @if(!empty($_GET['price']) && $_GET['price'] == '15000000-30000000') checked @endif>
                                        <label for="price4">15 تا 30 میلیون</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="price5" name="price_range" value="30000000-60000000" @if(!empty($_GET['price']) && $_GET['price'] == '30000000-60000000') checked @endif>
                                        <label for="price5">30 تا 60 میلیون</label>
                                    </div>
                                    <button type="submit" class="filter_button">اعمال</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    <div class="box">
                        <header class="card-header">
                            <h3 class="card-title"><span class="space-right-10">دسته بندی ها</span></h3>
                        </header>
                        <div class="box-content">
                            <ul class="categor-list">
                                @if ($menu)
                                    <li>
                                        @foreach ($menu as $cat_info)
                                            @if ($cat_info->child_cat->count() > 0)
                                                <li><a href="{{ route('product-cat', $cat_info->slug) }}">{{ $cat_info->title }}</a>
                                                    <ul>
                                                        @foreach ($cat_info->child_cat as $sub_menu)
                                                            <li><a href="{{ route('product-sub-cat', [$cat_info->slug, $sub_menu->slug]) }}">{{ $sub_menu->title }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li><a href="{{ route('product-cat', $cat_info->slug) }}">{{ $cat_info->title }}</a></li>
                                            @endif
                                        @endforeach
                                    </li>
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
                    <div class="box">
                        <header class="card-header">
                            <h3 class="card-title"><span class="space-right-10">پست‌های اخیر</span></h3>
                        </header>
                        <div class="box-content">
                            @if($recent_products->isNotEmpty())
                            @php 
                                $product = $recent_products->first();
                                $photo = explode(',', $product->photo);
                            @endphp
                            <div class="single-post first">
                                <div class="image">
                                    <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                </div>
                                <div class="content">
                                    <h5><a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a></h5>
                                    @php
                                        $org = ($product->price - ($product->price * $product->discount) / 100);
                                    @endphp
                                    <p class="price"><del class="text-muted">${{ number_format($product->price, 2) }}</del> ${{ number_format($org, 2) }}</p>
                                </div>
                            </div>
                        @endif
                        </div>
                    </div>
  
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
                                
                                
                                
                                <div class="pagination-wrapper">
                                    {{ $products->links('pagination::bootstrap-4') }}
                                </div>
                                

                            </div>
                        </div>
                        <!-- Repeat similar structure for other tabs like #most-visited, #delivery, #most-seller, #price -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .pagination-wrapper {
        text-align: center;
        margin-top: 20px;
    }
    
    .pagination {
        display: inline-block;
    }
    
    .pagination li {
        display: inline;
        margin: 0 5px;
    }
    
    .pagination li a {
        color: #333;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #ddd;
        border-radius: 3px;
    }
    
    .pagination li a:hover {
        background-color: #f0f0f0;
    }
    
    /* تنظیم اندازه فونت و سایر ویژگی‌های فلش‌های pagination */
    .pagination .page-link {
        font-size: 14px; /* تنظیم اندازه فونت فلش‌ها */
        line-height: 1.5; /* تنظیم ارتفاع خط فلش‌ها */
        display: inline-block; /* اطمینان از نمایش صحیح فلش‌ها */
        vertical-align: middle; /* تنظیم تراز عمودی فلش‌ها */
    }
    
    /* تنظیم اندازه فونت برای آیکون‌های خاص */
    .pagination .page-link svg {
        width: 16px; /* تنظیم عرض آیکون‌ها */
        height: 16px; /* تنظیم ارتفاع آیکون‌ها */
        vertical-align: middle; /* تنظیم تراز عمودی آیکون‌ها */
    }
    </style>

@endsection