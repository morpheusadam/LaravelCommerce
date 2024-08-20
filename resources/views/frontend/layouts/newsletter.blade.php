<!-- شروع خبرنامه فروشگاه -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- شروع خبرنامه داخلی -->
                    <div class="inner">
                        <h4>خبرنامه</h4>
                        <p>عضویت در خبرنامه ما و دریافت <span>۱۰٪</span> تخفیف در اولین خرید</p>
                        <form action="{{route('subscribe')}}" method="post" class="newsletter-inner">
                            @csrf
                            <input name="email" placeholder="آدرس ایمیل شما" required="" type="email">
                            <button class="btn" type="submit">عضویت</button>
                        </form>
                    </div>
                    <!-- پایان خبرنامه داخلی -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- پایان خبرنامه فروشگاه -->