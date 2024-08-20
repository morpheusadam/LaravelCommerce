<!-- Start Footer Area -->
<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer about">
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('backend/img/logo2.png')}}" alt="#"></a>
                        </div>
                        @php
                            $settings=DB::table('settings')->get();
                        @endphp
                        <p class="text">@foreach($settings as $data) {{$data->short_des}} @endforeach</p>
                        <p class="call">سوالی دارید؟ 24/7 با ما تماس بگیرید<span><a href="tel:123456789">@foreach($settings as $data) {{$data->phone}} @endforeach</a></span></p>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>اطلاعات</h4>
                        <ul>
                            <li><a href="{{route('about-us')}}">درباره ما</a></li>
                            <li><a href="#">سوالات متداول</a></li>
                            <li><a href="#">شرایط و ضوابط</a></li>
                            <li><a href="{{route('contact')}}">تماس با ما</a></li>
                            <li><a href="#">کمک</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>خدمات مشتری</h4>
                        <ul>
                            <li><a href="#">روش‌های پرداخت</a></li>
                            <li><a href="#">بازگشت وجه</a></li>
                            <li><a href="#">بازگشت کالا</a></li>
                            <li><a href="#">حمل و نقل</a></li>
                            <li><a href="#">سیاست حفظ حریم خصوصی</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer social">
                        <h4>تماس با ما</h4>
                        <!-- Single Widget -->
                        <div class="contact">
                            <ul>
                                <li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
                                <li>@foreach($settings as $data) {{$data->email}} @endforeach</li>
                                <li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                        <div class="sharethis-inline-follow-buttons"></div>
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>کپی رایت © {{date('Y')}} <a href="https://github.com/Prajwal100" target="_blank">پراجوال رای</a> - تمامی حقوق محفوظ است.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right">
                            <img src="{{asset('backend/img/payments.png')}}" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->

<!-- Jquery -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Color JS -->
<script src="{{asset('frontend/js/colors.js')}}"></script>
<!-- Slicknav JS -->
<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<!-- Countdown JS -->
<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
<!-- Flex Slider JS