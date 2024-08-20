@extends('frontend.theme2.layouts.master')

@section('title','E-Shop || Login Page')

@section('main-content')
<main class="wrapper default">
    <div class="container">
        <div class="row">
            <div class="main-content login_content col-12 col-md-7 col-lg-5 mx-auto">
                <header class="card-header">
                    <h3 class="card-title"><span>ورود به حساب کاربری</span></h3>
                </header>
                <div class="login_box">
                    <form class="form" method="post" action="{{route('login.submit')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-account-title"><span>*</span> نام کاربری</div>
                                <div class="form-account-row">
                                    <input class="input_second input_all" type="email" name="email" placeholder="نام کاربری شما" required="required" value="{{old('email')}}">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-account-title"><span>*</span> کلمه عبور</div>
                                <div class="form-account-row">
                                    <input class="input_second input_all" type="password" name="password" placeholder="کلمه عبور شما" required="required" value="{{old('password')}}">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-account-agree">
                                    <label class="checkbox-form checkbox-primary">
                                        <input type="checkbox" name="remember" id="agree">
                                        <span class="checkbox-check"></span>
                                    </label>
                                    <label for="agree"> مرا به خاطر بسپار</label>
                                </div>
                            </div>
                            <div class="col-6">
                                @if (Route::has('password.request'))
                                    <a class="faramooshi" href="{{ route('password.reset') }}">رمز عبور را فراموش کرده اید؟</a>
                                @endif
                            </div>
                            <div class="col-12 text--center">
                                <button type="submit" class="btn big_btn btn-main-masai">ورود</button>
                            </div>
                            <div class="col-12 footer_login_reg text--center">
                                <p>
                                    <span>کاربر جدید هستید؟</span>
                                    <a href="{{route('register.form')}}">ثبت نام</a>
                                </p>
                            </div>
                            <div class="col-12 text--center">
                                <p>یا ورود با</p>
                                <a href="{{route('login.redirect','facebook')}}" class="btn btn-facebook"><i class="ti-facebook"></i></a>
                                <a href="{{route('login.redirect','github')}}" class="btn btn-github"><i class="ti-github"></i></a>
                                <a href="{{route('login.redirect','google')}}" class="btn btn-google"><i class="ti-google"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
 @endsection