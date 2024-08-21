@extends('frontend.theme2.layouts.master')

@section('title','تک اسپورت || صفحه بلاگ')

@section('main-content')
<!-- main -->
<main class="search-page default space-top-30">
    <div class="container">
        <div class="row">
            
            <aside class="sidebar-page col-12 col-sm-12 col-md-4 col-lg-3">
                <form action="{{route('shop.filter')}}" method="POST">
                    @csrf
                    <div class="box">
                        <header class="card-header">
                            <h3 class="card-title"><span class="space-right-10">دسته بندی محصولات</span></h3>
                        </header>
                        <div class="box-content ">
                            <div class="product_filter">
                                <div class="label-input">
                                     <ul class="categor-list">
                                        @if(!empty($_GET['category']))
                                            @php
                                                $filter_cats = explode(',', $_GET['category']);
                                            @endphp
                                        @endif
                                        @foreach(Helper::postCategoryList('posts') as $cat)
                                            <li>
                                                <a href="{{route('blog.category', $cat->slug)}}" class="category-link @if(!empty($filter_cats) && in_array($cat->slug, $filter_cats)) active @endif">{{$cat->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="box">
                    <header class="card-header">
                        <h3 class="card-title"><span class="space-right-10">مقالات اخیر</span></h3>
                    </header>
                    <div class="box-content">
                        <div class="single-widget recent-post">
                           
                            @foreach($recent_posts as $post)
                                <!-- Single Post -->
                                <div class="single-post">
                                    <div class="image">
                                        <img  href="{{ route('blog.detail', $post->slug) }}" src="{{$post->photo}}"  alt="{{$post->photo}}">
                                    </div>
                                    <div class="content">
                                        <h6><a href="{{ route('blog.detail', $post->slug) }}" class="tag-link">{{$post->title}}</a></h6>
                                    </div>
                                </div>
                                <!-- End Single Post -->
                            @endforeach
                        </div>
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
                                <li><a class="tag-link" href="{{route('product-brand',$brand->slug)}}">{{$brand->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="box">
                    <header class="card-header">
                        <h3 class="card-title"><span class="space-right-10"> تگ های پر استفاده</span></h3>
                    </header>
                    <div class="box-content">
                        <div class="single-widget side-tags">
                             <ul class="tag">
                                @if(!empty($_GET['tag']))
                                    @php
                                        $filter_tags = explode(',', $_GET['tag']);
                                    @endphp
                                @endif
                                @foreach(Helper::postTagList('posts') as $tag)
                                    <li>
                                        <a href="{{route('blog.tag', $tag->title)}}" class="tag-link @if(!empty($filter_tags) && in_array($tag->title, $filter_tags)) active @endif">{{$tag->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                <div class="listing default">
                
                    </div>
                    <div class="tab-content default text-center">
                        <div class="tab-pane active" id="suggestion" role="tabpanel" aria-expanded="true">
                            <div class="row listing-items">
                                @foreach($posts as $post)
                                    @php
                                        $photos = explode(',', $post->photo);
                                    @endphp
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-12 list_search_p">
                                        <div class="product-box">
                                            <div class="product-seller-details product-seller-details-item-grid">
                                                <span class="search_prod_icon">
                                                    <i class="fa fa-search search_icon_search" aria-hidden="true"></i>
                                                    <i class="fa fa-heart search_icon_like" aria-hidden="true"></i>
                                                </span>
                                                <a href="{{ route('blog.detail', $post->slug) }}" class="search_prod_btn">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> مشاهده پست
                                                </a>
                                            </div>
                                            <a class="product-box-img" href="{{ route('blog.detail', $post->slug) }}">
                                                @if (!empty($photos))
                                                    <img class="main_img_gallery" src="{{ $photos[0] }}" alt="{{ $post->title }}">
                                                @endif
                                            </a>
                                            <div class="product-box-content">
                                                <div class="product-box-content-row">
                                                    <div class="product_title text-center">
                                                        <a href="{{ route('blog.detail', $post->slug) }}" class="post-title-box">{{ $post->title }}</a>
                                                    </div>
                                                </div>
                                                <div class="product-box-row product_price_search">
                                                    
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


<style>
    .category-link {
        color: #007bff; /* Flat blue color */
        text-decoration: none;
    }
    .category-link.active {
        font-weight: bold;
    }

    .post-title-box {
        border: 1px solid #007bff; /* Flat blue color */
        border-radius: 5px; /* Rounded corners */
        padding: 5px 10px; /* Padding inside the box */
        margin: 10px 0; /* Margin above and below the box */
        display: inline-block; /* Ensure the box fits the content */
        font-size: 0.75em; /* Make the text smaller */
        text-align: center; /* Center the text */
    }

    .tag-link {
        color: #007bff; /* Flat blue color */
        text-decoration: none;
    }
    .tag-link.active {
        font-weight: bold;
    }
</style>
@endsection

 
