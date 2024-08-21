<!DOCTYPE html>
<html lang="fa">


<!-- Mirrored from garzak.ir/garzak_them/Masai/M_01/template_01/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 May 2023 07:58:00 GMT -->

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>مَسای شاپ </title>
    <meta name="description" content="مَسای شاپ ">
    <meta name="author" content="Mirazimi">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />


    <!-- CSS Files -->
    <!-- CSS Files -->
    <link href="{{ asset('frontend/theme1/assets/fonts/font-awesome/css/fontawesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/theme1/assets/fonts/font-awesome/css/solid.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/theme1/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/theme1/assets/css/main_ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/theme1/assets/css/icon.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/theme1/assets/css/plugins/owl.carousel.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/theme1/assets/css/plugins/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/theme1/assets/css/nouislider.min.css') }}" rel="stylesheet" />
    <!-- only single -->
    <link href="{{ asset('frontend/theme1/assets/css/plugins/prettyphoto/css/prettyPhoto.css') }}" rel="stylesheet" />
    <!-- only single -->
    <link href="{{ asset('frontend/theme1/assets/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/theme1/assets/css/style.css') }}" rel="stylesheet" />



</head>

@include('frontend.theme2.layouts.header')
<!--start pc header -->
<!-- end pc header -->
<!-- main -->
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
<!-- main -->

<footer class="main-footer default">
    <div class="back-to-top ">
        <a href="#">
            <span class="icon"><i class="fa fa-chevron-up"></i></span> <span>
                بازگشت بالا
            </span>
        </a>
    </div>
    <div class=" servicesbg">
        <div class="footer-services container  space-10">
            <div class="row">
                <div class="service-item col-2 contact-box text-center">
                    <img src="assets/img/ico/png-4.png" class="width-40" />
                    <span class="title-1 light-black">ضمانت اصل بودن</span>
                </div>
                <div class="service-item col-2 contact-box text-center">
                    <img src="assets/img/ico/png-1.png" class="width-40" />
                    <span class="title-1 light-black">پرداخت در محل</span>
                </div>
                <div class="service-item col-2 contact-box text-center">
                    <img src="assets/img/ico/png-2.png" class="width-40" />
                    <span class="title-1 light-black">ارسال سریع</span>
                </div>
                <div class="service-item col-2 contact-box text-center">
                    <img src="assets/img/ico/png-5.png" class="width-40" />
                    <span class="title-1 light-black">فرصت 7 روزه استرداد</span>
                </div>
                <div class="service-item col-2 contact-box text-center">
                    <img src="assets/img/ico/png-3.png" class="width-40" />
                    <span class="title-1 light-black">پشتیبانی تلفنی</span>
                </div>
                <div class="service-item col-2 contact-box text-center">
                    <img src="assets/img/ico/png-7.png" class="width-40" />
                    <span class="title-1 light-black">هدیه نقدی</span>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid space-30 bg-map">

        <div class="footer-widgets container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <div class="card-header">
                            <h3 class="card-title">درباره ما</h3>
                        </div>
                        <p class="about_footer">
                            قالب مَسای یک پکیج کامل ایرانی با هدف بی نهایت قالب HTML و WordPress و به روز رسانی همیشگی
                            است، که تمام ویژگی های لازم طراحی سایت را در نظر میگیرد
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <div class="card-header">
                            <h3 class="card-title">خدمات مشتریان</h3>
                        </div>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">ارسال فوری</a>
                            </li>
                            <li>
                                <a href="#">پشتیبانی سریع</a>
                            </li>
                            <li>
                                <a href="#">بازگشت وجه</a>
                            </li>
                            <li>
                                <a href="#">بسته بندی کالا</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <div class="card-header">
                            <h3 class="card-title">با مَسای شاپ</h3>
                        </div>
                        <ul class="footer-menu">

                            <li>
                                <a href="#">تامین کالا همکار</a>
                            </li>
                            <li>
                                <a href="#">تخفیف سازمانی</a>
                            </li>
                            <li>
                                <a href="#">تماس با ما</a>
                            </li>
                            <li>
                                <a href="#">درباره ما</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <div class="card-header">
                            <h3 class="card-title">مجوزات</h3>
                        </div>
                        <div class="License_img">
                            <a href="#" target="_blank"><img src="assets/img/License_2.png"
                                    alt=""></a>
                            <a href="#" target="_blank"><img src="assets/img/License_1.png"
                                    alt=""></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="copyright">
        <div class="container">
            <p>
                این قالب به وسیله گروه برنامه نویسی گرزک پشتیبانی میشود.
            </p>
        </div>
    </div>
</footer>
</div>
<!--    JS Files   -->
<script src="{{ asset('frontend/theme1/assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/theme1/assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/theme1/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/theme1/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/theme1/assets/js/plugins/bootstrap-switch.js') }}"></script>
<script src="{{ asset('frontend/theme1/assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/theme1/assets/js/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>

<script src="{{ asset('frontend/theme1/assets/js/now-ui-kit.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/theme1/assets/js/plugins/countdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/theme1/assets/js/plugins/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/theme1/assets/js/plugins/jquery.easing.1.3.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('frontend/theme1/assets/js/plugins/jquery.ez-plus.js') }}" type="text/javascript"></script>

<!-- custom Js -->
<script src="{{ asset('frontend/theme1/assets/js/main.js') }}" type="text/javascript"></script>
<!-- only single  -->
<script src="{{ asset('frontend/theme1/assets/css/plugins/prettyphoto/js/jquery.prettyPhoto.js') }}"></script>
<script>
    function copyElementText(id) {
        var text = document.getElementById(id).innerText;
        var elem = document.createElement("textarea");
        document.body.appendChild(elem);
        elem.value = text;
        elem.select();
        document.execCommand("copy");
        document.body.removeChild(elem);
    }
</script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $("area[rel^='prettyPhoto']").prettyPhoto();

        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'normal',
            theme: 'light_square',
            slideshow: 3000,
            autoplay_slideshow: false
        });
        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'fast',
            slideshow: 10000,
            hideflash: true
        });
    });
</script>

</body>


<!-- Mirrored from garzak.ir/garzak_them/Masai/M_01/template_01/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 May 2023 07:58:06 GMT -->

</html>
