 
<section class="shop-newsletter section" style="background-color: #f8f9fa; padding: 40px 0;">
    <div class="container">
        <div class="inner-top">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner text-center" style="background-color: #61bec3; padding: 30px; border-radius: 10px;">
                        <h4 style="color: #fff;">خبرنامه</h4>
                        <p style="color: #fff;">عضویت در خبرنامه و دریافت <span style="color: #ffc107;">10%</span> تخفیف برای اولین خرید</p>
                        <form action="{{route('subscribe')}}" method="post" class="newsletter-inner" style="display: flex; flex-direction: column; align-items: center;">
                            @csrf
                            <input name="email" placeholder="آدرس ایمیل شما" required="" type="email" style="padding: 10px; border: 1px solid #6c757d; border-radius: 5px; margin-bottom: 10px; width: 100%; max-width: 400px;">
                            <button class="btn" type="submit" style="background-color: #ffc107; color: #fff; padding: 10px 20px; border: none; border-radius: 5px;">عضویت</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
 