@extends('frontend.theme2.layouts.master')

@section('title','E-SHOP || قبلاً وارد شده‌اید')

@section('main-content')
<main class="wrapper default">
    <div class="container">
        <div class="row">
            <div class="main-content login_content col-12 col-md-7 col-lg-5 mx-auto">
                <header class="card-header">
                    <h3 class="card-title"><span>قبلاً وارد شده‌اید</span></h3>
                </header>
                <div class="login_box">
                    <p>شما قبلاً وارد حساب کاربری خود شده‌اید. آیا می‌خواهید خارج شوید؟</p>
                    <form class="form" method="post" action="{{ route('logout') }}">
                        @csrf
                        <div class="col-12 text--center">
                            <button type="submit" class="btn big_btn btn-main-masai">خروج</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection