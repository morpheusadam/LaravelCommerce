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
                                <div class="form-account-title"><span>*</span> نام کاربری</div>
                                <div class="form-account-row">
                                    <input class="input_second input_all" type="text" name="name" placeholder="نام کاربری شما" required="required" value="{{old('name')}}">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
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
                                <div class="form-account-title"><span>*</span> کلمه عبور</div>
                                <div class="form-account-row">
                                    <input class="input_second input_all" type="password" name="password" placeholder="کلمه عبور شما" required="required">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-account-title"><span>*</span> تکرار کلمه عبور</div>
                                <div class="form-account-row">
                                    <input class="input_second input_all" type="password" name="password_confirmation" placeholder="تکرار کلمه عبور شما" required="required">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-account-agree">
                                    <label class="checkbox-form checkbox-primary">
                                        <input type="checkbox" id="agree" required>
                                        <span class="checkbox-check"></span>
                                    </label>
                                    <label for="agree">
                                        تمامی <a href="#">شرایط و قوانین</a> استفاده از سرویس‌های سایت را به دقت مطالعه کرده و با آنها موافقت کامل دارم 
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text--center">
                                <button type="submit" class="btn big_btn btn-main-masai">عضویت</button>
                            </div>
                            <div class="col-12 footer_login_reg text--center">
                                <p>
                                    <span>قبلا ثبت نام کرده‌اید؟</span>
                                    <a href="{{route('login.form')}}">ورود</a>
                                </p>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</main>

 
<style>
    .wrapper.default {
        padding: 50px 0;
    }
    .login_content {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .card-title {
        font-size: 24px;
        color: #333;
    }
    .login_box {
        padding: 20px;
    }
    .form-account-title {
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }
    .form-account-row {
        margin-bottom: 20px;
    }
    .input_second.input_all {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .form-account-agree {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .checkbox-form.checkbox-primary {
        margin-right: 10px;
    }
    .checkbox-check {
        width: 20px;
        height: 20px;
        border: 1px solid #ddd;
        border-radius: 3px;
        display: inline-block;
        position: relative;
    }
    .checkbox-check::after {
        content: '';
        width: 10px;
        height: 10px;
        background: #61bec3;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
    }
    .checkbox-form input[type="checkbox"]:checked + .checkbox-check::after {
        display: block;
    }
    .btn-main-masai {
        background: #61bec3;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }
    .btn-main-masai:hover {
        background: #4aa7b0;
    }
    .footer_login_reg {
        margin-top: 20px;
    }
    .footer_login_reg p {
        margin: 0;
    }
    .footer_login_reg a {
        color: #61bec3;
        text-decoration: none;
    }
    .footer_login_reg a:hover {
        text-decoration: underline;
    }
</style>
@endsection
