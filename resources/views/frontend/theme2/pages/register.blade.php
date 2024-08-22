@extends('frontend.theme2.layouts.master')

@section('title','E-SHOP || صفحه ثبت‌نام')

@section('main-content')
<main class="wrapper default">
    <div class="container">
        <div class="row">
            <div class="main-content login_content col-12 col-md-7 col-lg-5 mx-auto">
                <header class="card-header">
                    <h3 class="card-title"><span>ایجاد حساب کاربری</span></h3>
                </header>
                <div class="login_box">
                    <!-- Form -->
                    <form class="form" method="post" action="{{route('register.submit')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-account-title"><span>*</span> ایمیل</div>
                                <div class="form-account-row">
                                    <input class="input_second input_all" type="email" name="email" placeholder="ایمیل شما" required="required" value="{{old('email')}}">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-account-title"><span>*</span> رمز عبور</div>
                                <div class="form-account-row">
                                    <input class="input_second input_all" type="password" name="password" placeholder="رمز عبور شما" required="required">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-account-title"><span>*</span> تأیید رمز عبور</div>
                                <div class="form-account-row">
                                    <input class="input_second input_all" type="password" name="password_confirmation" placeholder="تأیید رمز عبور شما" required="required">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 text--center">
                                <button type="submit" class="btn big_btn btn-main-masai">ارسال کد</button>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection