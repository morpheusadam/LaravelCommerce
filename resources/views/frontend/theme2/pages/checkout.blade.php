@extends('frontend.theme2.layouts.master')

@section('title','تک اسپورت || تسویه حساب ')

@section('main-content')
<main class="cart-page default ">
    <div class="container">
        <div class="row">
            <div class="Final_payment_content col-12 mx-auto">
                <header class="card-header">
                    <h3 class="card-title"><span>تسویه حساب</span></h3>
                </header>
                <div class="account-box Final_payment_page">

                    <div class="account-box-content">
                        <form class="form-account" action="{{ route('place-order') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-account-title"><span>*</span> نام</div>
                                            <div class="form-account-row">
                                                <input class="input_second input_all" type="text" placeholder=" نام شما" name="first_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-account-title"><span>*</span> نام خانوادگی</div>
                                            <div class="form-account-row">
                                                <input class="input_second input_all" type="text" placeholder=" نام خانوادگی شما" name="last_name">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-account-title"> نام شرکت (اختیاری)</div>
                                            <div class="form-account-row">
                                                <input class="input_second input_all" type="text" placeholder=" نام شرکت شما" name="company_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-account-title"><span>*</span> شماره تماس</div>
                                            <div class="form-account-row">
                                                <input class="input_second input_all" type="text" placeholder=" شماره تماس شما" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-account-title"><span>*</span> پست الکترونیک</div>
                                            <div class="form-account-row">
                                                <input class="input_second input_all" type="text" placeholder=" پست الکترونیک شما" name="email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-account-title">آدرس پستی</div>
                                            <div class="form-account-row">
                                                <textarea class="input_second input_all input_textarea text-right" rows="5" placeholder=" آدرس پستی خود را وارد نمایید" name="address"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-account-agree">
                                                <label class="checkbox-form checkbox-primary">
                                                    <input type="checkbox" id="agree" name="agree">
                                                    <span class="checkbox-check"></span>
                                                </label>
                                                <label for="agree"> گیرنده خودم هستم</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="row">
                                        <table class="table table_details table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>محصول</th>
                                                    <th>قیمت کل</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $cartItems = Helper::getAllProductFromCart();
                                                    $totalPrice = 0;
                                                @endphp
                                                @foreach($cartItems as $item)
                                                    @php
                                                        $totalPrice += $item->price * $item->quantity;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $item->product->title }}</td>
                                                        <td>{{ number_format($item->price * $item->quantity, 2) }} <span>تومان</span></td>
                                                    </tr>
                                                @endforeach
                                                <tr class="all">
                                                    <td>مجموع</td>
                                                    <td>{{ number_format($totalPrice, 2) }} <span>تومان</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="Final_payment_det">
                                                        <div class="col-12 ">
                                                            <p>
                                                                <i class="fa fa-circle"></i> بعد از پرداخت مستقیم به شماره حساب شرکت، از قسمت چت آنلاین سایت رسید را برای ما ارسال کرده تا پس از تایید محصول برای شما ارسال گردد.
                                                                <br />
                                                                <i class="fa fa-circle"></i> برای حفظ محیط زیست از نسخه الکترونیکی فاکتور در پروفایل خود به جای چاپ کاغذی می توانید استفاده کنید.
                                                            </p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <button type="submit" class="btn big_btn btn-main-masai"> پرداخت نهایی </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection