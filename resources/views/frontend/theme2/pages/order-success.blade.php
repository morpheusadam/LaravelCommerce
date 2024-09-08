@extends('frontend.theme2.layouts.master')
@section('title','تک اسپورت || پرداخت موفق ')

@section('title','Order Success')
@section('main-content')
<main class="order-success-page default space-top-30">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h1>سفارش شما با موفقیت ثبت شد</h1>
				<p>از خرید شما متشکریم. سفارش شما در حال پردازش است.</p>
				<p>شماره سفارش شما: <strong>{{ $order->order_number }}</strong></p>
				<p>مبلغ کل: <strong>{{ number_format($order->total_amount, 2) }} تومان</strong></p>
				<a href="{{ route('home') }}" class="btn btn-main-masai">بازگشت به صفحه اصلی</a>
			</div>
		</div>
	</div>
</main>
@endsection