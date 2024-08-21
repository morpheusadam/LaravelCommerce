@extends('frontend.theme2.layouts.master')

@section('title','تک اسپورت || بلاگ ')

@section('main-content')
    <!-- main -->
    <main class="search-page default space-top-30">
        <div class="container">
            <div class="row">
                <aside class="sidebar-page col-12 col-sm-12 col-md-4 col-lg-3">
                    <form action="{{ route('shop.filter') }}" method="POST">
                        @csrf
                        <div class="box">
                            <header class="card-header">
                                <h3 class="card-title"><span class="space-right-10">دسته بندی محصولات</span></h3>
                            </header>
                            <div class="box-content">
                                <div class="product_filter">
                                    <div class="label-input">
                                        <ul class="categor-list">
                                            @if (!empty($_GET['category']))
                                                @php
                                                    $filter_cats = explode(',', $_GET['category']);
                                                @endphp
                                            @endif
                                            @foreach (Helper::postCategoryList('posts') as $cat)
                                                <li>
                                                    <a class="tag-link" href="{{ route('blog.category', $cat->slug) }}"
                                                        class="category-link @if (!empty($filter_cats) && in_array($cat->slug, $filter_cats)) active @endif">{{ $cat->title }}</a>
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
                                        <img href="{{ route('blog.detail', $post->slug) }}" src="{{$post->photo}}"  alt="{{$post->photo}}">
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
                                    $brands = DB::table('brands')
                                        ->orderBy('title', 'ASC')
                                        ->where('status', 'active')
                                        ->get();
                                @endphp
                                @foreach ($brands as $brand)
                                    <li><a href="{{ route('product-brand', $brand->slug) }}" class="tag-link">{{ $brand->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="box">
                        <header class="card-header">
                            <h3 class="card-title"><span class="space-right-10">تگ های پر استفاده </span></h3>
                        </header>
                        <div class="box-content">
                            <div class="single-widget side-tags">
                                <ul class="tag">
                                    @if (!empty($_GET['tag']))
                                        @php
                                            $filter_tags = explode(',', $_GET['tag']);
                                        @endphp
                                    @endif
                                    @foreach (Helper::postTagList('posts') as $tag)
                                        <li>
                                            <a href="{{ route('blog.tag', $tag->title) }}"
                                                class="tag-link @if (!empty($filter_tags) && in_array($tag->title, $filter_tags)) active @endif">{{ $tag->title }}</a>
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
                        <div class="blog-single-main">
                            <div class="row">
                                <div class="col-12">
                                    <div class="image">
                                        <img src="{{ $post->photo }}" alt="{{ $post->photo }}">
                                    </div>
                                    <div class="blog-detail">
                                        <h2 class="blog-title">{{ $post->title }}</h2>
                                        <div class="blog-meta">
                                            <span class="author"><a href="javascript:void(0);"><i class="fa fa-user"></i>By
                                                    {{ $post->author_info['name'] }}</a><a href="javascript:void(0);"><i
                                                        class="fa fa-calendar"></i>{{ $post->created_at->format('M d, Y') }}</a><a
                                                    href="javascript:void(0);"><i class="fa fa-comments"></i>Comment
                                                    ({{ $post->allComments->count() }})</a></span>
                                        </div>
                                        <div class="sharethis-inline-reaction-buttons"></div>
                                        <div class="content">
                                            @if ($post->quote)
                                                <blockquote> <i class="fa fa-quote-left"></i> {!! $post->quote !!}
                                                </blockquote>
                                            @endif
                                            <p>{!! $post->description !!}</p>
                                        </div>
                                    </div>
                                    <div class="share-social">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="content-tags">
                                                    <h4>تگ ها:</h8>
                                                        <ul class="tag-inner">
                                                            @php
                                                                $tags = explode(',', $post->tags);
                                                            @endphp
                                                            @foreach ($tags as $tag)
                                                                <li><a href="javascript:void(0);">{{ $tag }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @auth
                                <div class="col-12 mt-4">
                                    <div class="reply">
                                        <div class="reply-head comment-form" id="commentFormContainer">
                                            <h2 class="reply-title">کامنت بزارید</h2>
                                            <!-- Comment Form -->
                                            <form class="form comment_form" id="commentForm"
                                                action="{{ route('post-comment.store', $post->slug) }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group comment_form_body">
                                                            <label>صدای مشتری<span>*</span></label>
                                                            <textarea name="comment" id="comment" rows="10" placeholder=""></textarea>
                                                            <input type="hidden" name="post_id"
                                                                value="{{ $post->id }}" />
                                                            <input type="hidden" name="parent_id" id="parent_id"
                                                                value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="btn"><span
                                                                    class="comment_btn comment">Post Comment</span><span
                                                                    class="comment_btn reply" style="display: none;">Reply
                                                                    Comment</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- End Comment Form -->
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-4">
                                    <div class="reply">
                                        <div class="reply-head comment-form" id="commentFormContainer">
                                            <h2 class="reply-title">کامنت بزارید</h2>
                                            <p class="text-center">برای گذاشتن کامنت لطفا <a href="{{ route('login.form') }}">ثبت نام</a> کنید یا <a href="{{ route('login.form') }}">وارد شوید</a>.</p>
                                            <!-- Comment Form -->
                                            <form class="form comment_form" id="commentForm"
                                                action="{{ route('post-comment.store', $post->slug) }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group comment_form_body">
                                                            <label>صدای مشتری<span>*</span></label>
                                                            <textarea name="comment" id="comment" rows="10" placeholder=""></textarea>
                                                            <input type="hidden" name="post_id"
                                                                value="{{ $post->id }}" />
                                                            <input type="hidden" name="parent_id" id="parent_id"
                                                                value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="btn" disabled><span
                                                                    class="comment_btn comment">Post Comment</span><span
                                                                    class="comment_btn reply" style="display: none;">Reply
                                                                    Comment</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- End Comment Form -->
                                        </div>
                                    </div>
                                </div>
                            @endauth
                            <div class="col-12">
                                <div class="comments unique-comments-section" style="width: 100%;">
                                    <h3 class="custom-comment-title">تعداد کامنت ها  ({{ $post->allComments->count() }})</h3>
                                    <!-- Single Comment -->
                                    <div class="unique-comment-wrapper">
                                        @include('frontend.theme2.pages.comment', [
                                            'comments' => $post->comments,
                                            'post_id' => $post->id,
                                            'depth' => 3,
                                        ])
                                    </div>
                                    <!-- End Single Comment -->
                                </div>
                            </div>
                           
                            </div>
                        </div>
                        <!-- Repeat similar structure for other tabs like #most-visited, #delivery, #most-seller, #price -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->
    
<style>
    .comment-form {
        background-color: #61bec3; /* Light Blue */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .comment-form .reply-title {
        color: #ffc107; /* Yellow */
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }

    .comment-form .form-group label {
        color: #ffc107; /* Yellow */
        font-weight: bold;
    }

    .comment-form .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #17a2b8; /* Dark Blue */
        border-radius: 5px;
        resize: none;
    }

    .comment-form .form-group .btn {
        background-color: #17a2b8; /* Dark Blue */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .comment-form .form-group .btn:hover {
        background-color: #138496; /* Slightly darker blue */
    }

    .comment-form .form-group .btn[disabled] {
        cursor: not-allowed;
    }

    .post-title-box {
        border: 1px solid #007bff; /* Flat blue color */
        border-radius: 5px; /* Rounded corners */
        padding: 5px 10px; /* Padding inside the box */
        margin: 10px 0; /* Margin above and below the box */
        display: inline-block; /* Ensure the box fits the content */
        font-size: 0.75em; /* Make the text smaller */
    }

    .custom-comment-title {
        font-size: 0.7em; /* دو برابر کوچک‌تر */
        background-color: #61bec3; /* پس‌زمینه مشکی */
        color: #fff; /* رنگ متن سفید */
        padding: 10px; /* پدینگ */
        border: 1px solid #fff; /* مربع دور متن */
        display: inline-block; /* برای نمایش مربع دور متن */
        margin-top: 10px; /* فاصله از بالا */
    }

   
.blog-title {
    font-size: 2.5em; /* دو برابر کوچک‌تر */
    color: #61bec3; /* Flat blue color */
    padding-top: 10px;
}

.tag-link {
    border:2px solid transparent; 
    border-color: #ffc107;
    color: #272929; /* White text color */
    text-decoration: none;
    background-color: #ffffff; /* Flat blue color */
    padding: 5px 10px; /* Padding inside the box */
    border-radius: 5px; /* Rounded corners */
    display: inline-block; /* Ensure the box fits the content */
    margin: 1%; /* Margin around the box */
    position: relative; /* For pseudo-element positioning */
}



.tag-link.active {
    font-weight: bold;
}

</style>

@endsection

