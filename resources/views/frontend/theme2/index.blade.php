@extends('frontend.theme2.layouts.master')
@section('title','تک اسپورت || صفحه اصلی')

@section('main-content')
    <main class="main default space-top-10">

        <div class="container-fluid">
            <div class="slider_main owl-carousel owl-theme">

                @if (count($banners) > 0)
                    @foreach ($banners as $key => $banner)
                        <div class="item">
                            <a href="{{ route('product-grids') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="svg_Masai" width="231" height="75"
                                    viewBox="0 0 231 75" fill="none"
                                    style="float: right; margin-bottom: -100px; position: relative; z-index: 9; margin-top: 0px; margin-right: 30px;">
                                    <path clip-rule="evenodd"
                                        d="M0 0C31.5006 0.949537 50.52 17.872 56.1955 26.4544L55.986 25.8011L82.4924 58.631C99.3032 79.4521 131.038 79.4521 147.849 58.6309L174.356 25.8011L174.146 26.4544C179.822 17.872 198.844 0.949537 230.349 0H0Z"
                                        fill="#FCFCFC" fill-rule="" style="fill: #fff;"></path>
                                </svg>
                                <img src="{{ $banner->photo }}" class="img-fluid imgslider" alt="{{ $banner->title }}">
                            </a>
                        </div>
                    @endforeach
                @endif




            </div>
        </div>
        <div class="container space-top-50 ">
            <div class="row space-bottom-30">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-3 contact-miniicon text-center">
                            <div class="space-5">
                                <img src="{{ asset('frontend/theme1/assets/img/Masai/minilogo/1.png') }}" class="minilogo_w">
                                <b class="title-3 light-black">تک اسپورت مارکت</b>
                            </div>
                        </div>
                        <div class="col-3 contact-miniicon text-center">
                            <div class="space-5">
                                <img src="{{ asset('frontend/theme1/assets/img/Masai/minilogo/2.png') }}" class="minilogo_w">
                                <b class="title-3 light-black">حراج تک اسپورت</b>
                            </div>
                        </div>
                        <div class="col-3 contact-miniicon text-center">
                            <div class="space-5">
                                <img src="{{ asset('frontend/theme1/assets/img/Masai/minilogo/3.png') }}" class="minilogo_w">
                                <b class="title-3 light-black">خرید اقساطی</b>
                            </div>
                        </div>
                        <div class="col-3 contact-miniicon text-center">
                            <div class="space-5">
                                <img src="{{ asset('frontend/theme1/assets/img/Masai/minilogo/4.png') }}" class="minilogo_w">
                                <b class="title-3 light-black">تک اسپورت سرویس</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">

                        <div class="col-3 contact-miniicon text-center">
                            <div class="space-5">
                                <img src="{{ asset('frontend/theme1/assets/img/Masai/minilogo/5.png') }}" class="minilogo_w">
                                <b class="title-3 light-black">ماه رمضان</b>
                            </div>
                        </div>
                        <div class="col-3 contact-miniicon text-center">
                            <div class="space-5">
                                <img src="{{ asset('frontend/theme1/assets/img/Masai/minilogo/6.png') }}" class="minilogo_w">
                                <b class="title-3 light-black">تک اسپورت پلاس</b>
                            </div>
                        </div>
                        <div class="col-3 contact-miniicon text-center">
                            <div class="space-5">
                                <img src="{{ asset('frontend/theme1/assets/img/Masai/minilogo/7.png') }}" class="minilogo_w">
                                <b class="title-3 light-black">هدیه خرید</b>
                            </div>
                        </div>
                        <div class="col-3 contact-miniicon text-center">
                            <div class="space-5">
                                <img src="{{ asset('frontend/theme1/assets/img/Masai/minilogo/8.png') }}" class="minilogo_w">
                                <b class="title-3 light-black">بیشتر</b>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">





                <div class="col-12">

                    <div class="row banner-ads">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <div class="widget-banner card border_all">
                                        <a href="category-search.html" target="_blank">
                                            <img class="img-fluid" src="https://kiavarzesh.com/upload/advertise/2021/06/19691973.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="widget-banner card">
                                        <a href="category-search.html" target="_top">
                                            <img class="img-fluid" src="https://kiavarzesh.com/upload/advertise/2021/06/15760573.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="widget-banner card border_all">
                                        <a href="category-search.html" target="_blank">
                                            <img class="img-fluid" src="https://kiavarzesh.com/upload/advertise/2021/06/52088875.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="widget-banner card">
                                        <a href="category-search.html" target="_top">
                                            <img class="img-fluid" src="https://kiavarzesh.com/upload/advertise/2022/09/6241453.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card border_all bglight pad_time_prod" id="shegeft_1">
                                <header class="card-header">
                                    <h3 class="card-title">
                                        <span>
                                            <img src="{{ asset('frontend/theme1/assets/img/shegeft_1.png') }}" />
                                        </span>
                                    </h3>
                                    <div class="countdown-timer" countdown data-date="{{ $endDate }}">
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
                                </header>
                                <div class="product-carousel owl-carousel owl-theme">
                                    @if ($product_lists)
                                        @foreach ($product_lists as $key => $product)
                                            <div class="item">
                                                <a href="{{ route('product-detail', $product->slug) }}">
                                                    @php
                                                        $photo = explode(',', $product->photo);
                                                    @endphp
                                                    <img src="{{ $photo[0] }}" class="img-fluid"
                                                        alt="{{ $product->title }}">
                                                </a>
                                                <h2 class="product_title" style="padding-top: 10px; text-align: center;">
                                                    <a href="{{ route('product-detail', $product->slug) }}">
                                                        {{ $product->title }}</a>
                                                </h2>
                                                <div class="price">
                                                    @php
                                                        $after_discount =
                                                            $product->price -
                                                            ($product->price * $product->discount) / 100;
                                                    @endphp
                                                    <del><span>{{ number_format($product->price, 2) }}
                                                            <span>تومان</span></span></del>
                                                    <span class="discount_badge">{{ $product->discount }}%</span>
                                                    <ins><span>{{ number_format($after_discount, 2) }}<span>تومان</span></span></ins>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif


                                </div>
                                <a href="{{ route('product-grids') }}" class="view_more">مشاهده بیشتر</a>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="row banner-ads">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="widget-banner card border_all">
                                    <a href="category-search.html" target="_blank">
                                        <img class="img-fluid"
                                            src="{{ asset('frontend/theme1/assets/img/banner_img/img-7.jpg') }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="widget-banner card">
                                    <a href="category-search.html" target="_top">
                                        <img class="img-fluid"
                                            src="{{ asset('frontend/theme1/assets/img/banner_img/img-8.jpg') }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 






                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card border_all bglight pad_time_prod" id="shegeft_1">
                                <header class="card-header">
                                    <h3 class="card-title">
                                        <span>
                                            <img src="{{ asset('frontend/theme1/assets/img/seller_1.png') }}" />
                                        </span>
                                    </h3>
                                    <div class="countdown-timer" countdown data-date="{{ $endDate }}">
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
                                </header>
                                <div class="product-carousel owl-carousel owl-theme">
                                    @if ($product_lists)
                                        @foreach ($product_lists as $key => $product)
                                            <div class="item">
                                                <a href="{{ route('product-detail', $product->slug) }}">
                                                    @php
                                                        $photo = explode(',', $product->photo);
                                                    @endphp
                                                    <img src="{{ $photo[0] }}" class="img-fluid"
                                                        alt="{{ $product->title }}">
                                                </a>
                                                <h2 class="product_title" style="padding-top: 10px; text-align: center;">
                                                    <a href="{{ route('product-detail', $product->slug) }}">
                                                        {{ $product->title }}</a>
                                                </h2>
                                                <div class="price">
                                                    @php
                                                        $after_discount =
                                                            $product->price -
                                                            ($product->price * $product->discount) / 100;
                                                    @endphp
                                                    <del><span>{{ number_format($product->price, 2) }}
                                                            <span>تومان</span></span></del>
                                                    <span class="discount_badge">{{ $product->discount }}%</span>
                                                    <ins><span>{{ number_format($after_discount, 2) }}<span>تومان</span></span></ins>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif


                      
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
               
           


           <div class="row">
            <div class="col-12">
                <div class="brand-slider card border_all bglight">
                    <header class="card-header">
                        <h3 class="card-title"><span>محبوب‌ترین برندها</span></h3>
                    </header>
                    <div class="owl-carousel">
                        @if($brands)
                            @foreach($brands as $brand)
                                <div class="item borderitem">
                                    <a href="{{ route('product-brand', $brand->slug) }}" style="font-size: 24px; font-weight: bold; text-align: center; display: block; padding: 20px;">
                                        {{ $brand->title }}
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>



        </div>
    </main>
@endsection
