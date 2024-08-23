@extends('frontend.theme2.layouts.master')
@section('title','تک اسپورت || تماس با ما ')

@section('main-content')
	 


<main class="single-product default">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </li>

                        <li>
                            <a href="category-search.html"><span>خانه</span></a>
                        </li>

                        <li>
                            <a href="category-search.html"><span>فروشگاه</span></a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <article class="product">
                    <div class="row product_main_details">
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <div class="product-gallery default">
                                @php
                                    $photo = explode(',', $product_detail->photo);
                                @endphp

                                @if (!empty($photo))
                                    <img class="main_img_gallery" src="{{ $photo[0] }}"
                                        alt="{{ $photo[0] }}" />
                                @endif

                                <section class="testimonial py-3" id="testimonial">
                                    <div class="container">
                                        <div class="row gallery">
                                            @foreach (array_slice($photo, 1) as $data)
                                                <div class="col-4 col-md-3 pd">
                                                    <a href="{{ $data }}" rel="prettyPhoto[gallery1]">
                                                        <img src="{{ $data }}" class="img-thumb"
                                                            alt="{{ $data }}" />
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <ul class="gallery-options">
                                <li>
                                    <button class="add-favorites favorites2"><i class="fa fa-heart"></i></button>
                                </li>
                                <li>
                                    <button class="favorites2" data-toggle="modal" data-target="#myModal"><i
                                            class="fa fa-share-alt"></i></button>
                                </li>
                            </ul>
                            <!-- Modal Core -->
                            <div class="modal-share modal fade" id="myModal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">به اشتراک گذاشتن</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <form class="default">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p>
                                                            برای کپی آدرس در کادر زیر دابل کلیک کنید
                                                        </p>
                                                        <p class="right-side-header shareurlvalue"
                                                            title="کپی بعد دوبار کلیک" id="text"
                                                            onclick="copyElementText(this.id)">
                                                            http://www.mysite.com/single-product.html</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Core -->
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-12 ">
                            <h2 class="product-title ">
                                <a href="#"> {{ $product_detail->title }} </a>
                            </h2>
                            <hr class="hr-text" data-content="تمامی محصولات دارای گارانتی اصالت کالا میباشد">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="list-group space-15">
                                        <li class="list-group-item">{!! $product_detail->summary !!}</li>

                                    </ul>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 product_main_pr">
                                    <div class="time_pr">
                                        <div class="row">
                                            <div class="col-12 upda">
                                                <b>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    زمان ارسال محصول :
                                                </b>
                                                از انبار مَسای کالا طی 2 روز کاری
                                            </div>
                                            <div class="col-12 col-lg-6 col-md-6">


                                                <p>زمان باقی مانده </p>



                                                <div class="countdown-timer" countdown
                                                    data-date="{{ $endDate }}">
                                                    <ul class="text_countdown">
                                                        <li data-days class="number_countdown">0</li>
                                                        <li>روز</li>
                                                    </ul>
                                                    <ul class="text_countdown">
                                                        <li data-hours class="number_countdown">0</li>
                                                        <li>ساعت</li>
                                                    </ul>
                                                    <ul class="text_countdown">
                                                        <li data-minutes class="number_countdown">0</li>
                                                        <li>دقیقه</li>
                                                    </ul>
                                                    <ul class="text_countdown">
                                                        <li data-seconds class="number_countdown">0</li>
                                                        <li>ثانیه</li>
                                                    </ul>
                                                </div>



                                            </div>
                                            <div class="col-12 col-lg-6 col-md-6 border_left">
                                                <div class="price space-15">
                                                    @php
                                                        $after_discount = $product_detail->price - ($product_detail->discount * $product_detail->price) / 100;
                                                    @endphp
                                                    <del><span>{{ number_format($product_detail->price, 2) }} <span>تومان</span></span></del>
                                                    <ins><span>{{ number_format($after_discount, 2) }} <span>تومان</span></span></ins>
                                                </div>
                                                <div class="col-12 timer-title text--center">
                                                    <form action="{{route('single-add-to-cart')}}" method="POST">
                                                        @csrf 
                                                        <div class="quantity">
                                                            <h6>تعداد :</h6>
                                                            <!-- Input Order -->
                                                            <div class="input-group">
                                                                <div class="button minus">
                                                                   
                                                                </div>
                                                                <input type="hidden" name="slug" value="{{$product_detail->slug}}">
                                                                <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1" id="quantity">
                                                                    
                                                                </div>
                                                            </div>
                                                        <!--/ End Input Order -->
                                                        </div>
                                                        <div class="add-to-cart mt-4">
                                                            <button href="{{route('add-to-wishlist',$product_detail->slug)}}"  type="submit" class="btn">افزودن به سبد خرید</button>
                                                         </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="txt_note">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                        برای کالاهای گروه ورزشی، امکان برگشت کالا به دلیل انصراف از خرید تنها در صورتی
                                        مورد قبول است که کالا بدون هیچگونه استفاده و با تمامی قطعات، متعلقات و
                                        بسته‌بندی‌های اولیه خود بازگردانده شود. لازم به ذکر است که برای هر کالای ورزشی،
                                        ضمانت اصالت کالا صادر می‌شود. در صورت بروز اشکال در ضمانت اصالت کالا، پس از
                                        انقضای مدت ۳۰ روزه، کالا می‌تواند بازگردانده شود.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 default no-padding bg_single_product">
                    <div class="product-tabs default">
                        <div class="box-tabs default">
                            <ul class="nav" role="tablist">
                                <li class="box-tabs-tab">
                                    <a class="active" data-toggle="tab" href="#desc" role="tab" aria-expanded="true">
                                        توضیحات تکمیلی
                                    </a>
                                </li>
                                <li class="box-tabs-tab">
                                    <a data-toggle="tab" href="#params" role="tab" aria-expanded="false">
                                        مشخصات محصول
                                    </a>
                                </li>
                                <li class="box-tabs-tab">
                                    <a data-toggle="tab" href="#comments" role="tab" aria-expanded="false">
                                        دیدگاه خریداران
                                    </a>
                                </li>
                                <li class="box-tabs-tab">
                                    <a data-toggle="tab" href="#comments_questions" role="tab" aria-expanded="false">
                                        پرسش و نظر
                                    </a>
                                </li>
                            </ul>
                            <div class="card-body default">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="desc" role="tabpanel" aria-expanded="true">
                                        <header class="card-header">
                                            <h3 class="card-title"><span>بررسی تخصصی {{ $product_detail->title }}</span></h3>
                                        </header>
                                        <div class="parent-expert default">
                                            <div class="content-expert">
                                                <p>{!! $product_detail->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane params" id="params" role="tabpanel" aria-expanded="false">
                                        <header class="card-header">
                                            <h3 class="card-title"><span>بررسی تخصصی {{ $product_detail->title }}</span></h3>
                                        </header>
                                        <div class="col-12">
                                            <ul class="list-group">
                                                {!! $product_detail->summary !!}
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="comments" role="tabpanel" aria-expanded="false">
                                        <header class="card-header">
                                            <h3 class="card-title"><span>دیدگاه های دیگر کاربران</span></h3>
                                        </header>
                                        <div class="comments_form default">
                                            <ol class="comment-list">
                                                @foreach ($product_detail->getReview as $data)
                                                    <li>
                                                        <div class="comment-body">
                                                            <div class="comment-author">
                                                                @if (!empty($data->user_info->photo))
                                                                    <img alt="{{ $data->user_info->name }}" src="{{ $data->user_info->photo }}" class="avatar">
                                                                @else
                                                                    <img alt="{{ $data->user_info->name }}" src="{{ asset('backend/img/avatar.png') }}" class="avatar">
                                                                @endif
                                                                <span class="rating-circle">{{ ceil($data->rate) }}</span>
                                                                <div class="text-h5">{{ $data->user_info->name }}</div>
                                                            </div>
                                                            <p>{{ $data->review }}</p>
                                                            <ul class="commentul">
                                                                <li>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</li>
                                                                <li>{{ $data->user_info->name }}</li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                    <div class="tab-pane form-comment" id="comments_questions" role="tabpanel" aria-expanded="false">
                                        <header class="card-header">
                                            <h3 class="card-title"><span>ارسال نظر و پرسش</span></h3>
                                        </header>
                                        @auth
                                        <form class="form" method="post" action="{{ route('review.store', $product_detail->slug) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <div class="rating_box">
                                                        <div class="star-rating">
                                                            <div class="star-rating__wrap">
                                                                @for ($i = 5; $i >= 1; $i--)
                                                                    <input class="star-rating__input" id="star-rating-{{ $i }}" type="radio" name="rate" value="{{ $i }}">
                                                                    <label class="star-rating__ico" for="star-rating-{{ $i }}" title="{{ $i }} out of 5 stars">{{ $i }}</label>
                                                                @endfor
                                                                @error('rate')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group">
                                                        <label>از یک تا پنج به این محصول چقد نمره میدهید؟</label>
                                                        <textarea name="review" rows="6" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group button5">
                                                        <button class="btn btn-main-masai">ارسال برای تایید</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @else
                                        <p>برای ارسال نظر لطفا <a href="{{ route('login') }}">وارد شوید</a>.</p>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>



@endsection