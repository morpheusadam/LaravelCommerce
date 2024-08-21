@extends('frontend.theme2.layouts.master')

@section('title','E-SHOP || پیگیری سفارش')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">خانه<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">پیگیری سفارش</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
            <p>برای پیگیری سفارش خود، لطفاً شناسه سفارش خود را در کادر زیر وارد کرده و دکمه "پیگیری" را فشار دهید. این شناسه در رسید شما و در ایمیل تأییدیه‌ای که دریافت کرده‌اید، موجود است.</p>
            <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
              @csrf
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control p-2"  name="order_number" placeholder="شناسه سفارش خود را وارد کنید">
                </div>
                <div class="col-md-8 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">پیگیری سفارش</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .breadcrumbs {
        background: #f8f9fa;
        padding: 20px 0;
        margin-bottom: 20px;
    }
    .breadcrumbs .bread-inner {
        text-align: right;
    }
    .breadcrumbs .bread-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .breadcrumbs .bread-list li {
        display: inline;
        font-size: 14px;
        color: #333;
    }
    .breadcrumbs .bread-list li a {
        color: #007bff;
        text-decoration: none;
    }
    .breadcrumbs .bread-list li a:hover {
        text-decoration: underline;
    }
    .tracking_box_area {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .tracking_box_inner p {
        font-size: 16px;
        color: #555;
        margin-bottom: 20px;
    }
    .tracking_form .form-group input {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
    }
    .tracking_form .form-group button {
        background: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }
    .tracking_form .form-group button:hover {
        background: #0056b3;
    }
</style>
@endpush