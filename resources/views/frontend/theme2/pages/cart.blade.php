@extends('frontend.theme2.layouts.master')
@section('title','تک اسپورت ||   سبد خرید ')
@section('main-content')
<main class="cart-page default space-top-30">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<ul class="order-steps">
					<li>
						<a href="{{ route('cart') }}" class="active">
							<span>سبدخرید</span>
						</a>
					</li>
					<li>
						<a href="{{ route('checkout') }}">
							<span>پرداخت</span>
						</a>
					</li>
					<li>
						<a href="successful-payment.html">
							<span>اتمام خرید و ارسال</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="cart_content col-xl-12 col-lg-12 col-md-12">
				<header class="card-header">
					<h3 class="card-title"><span>سبد خرید شما</span></h3>
				</header>
				<div class="table-responsive default">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">محصول</th>
								<th scope="col">سبد خرید شما</th>
								<th scope="col">قیمت واحد</th>
								<th scope="col">تعداد</th>
								<th scope="col">قیمت نهایی</th>
							</tr>
						</thead>
						<tbody>
							<form id="cart-form" action="{{ route('update-cart') }}" method="POST">
								@csrf
								@if(Helper::getAllProductFromCart())
									@foreach(Helper::getAllProductFromCart() as $key => $cart)
										@php
											$photo = explode(',', $cart->product['photo']);
										@endphp
										<tr class="cart_item">
											<td>
												<img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
												<a href="{{ route('cart-delete', $cart->id) }}"><i class="fa fa-times" aria-hidden="true"></i></a>
											</td>
											<td>
												<h3 class="cart_title">
													<a href="{{ route('product-detail', $cart->product['slug']) }}">
														{{ $cart->product['title'] }}
													</a>
												</h3>
												<div class="cart_content">
													<div><span>بیمه </span><span class="item_property">{{ $cart->product['insurance'] ?? 'N/A' }}</span></div>
													<span class="cart_divider"></span>
													<div><span>رنگ </span><span class="item_property">{{ $cart->product['color'] ?? 'N/A' }}</span></div>
												</div>
											</td>
											<td>
												<div class="cart_price">
													<del><span>{{ number_format($cart->product['price'], 2) }} <span>تومان</span></span></del>
													<ins><span>{{ number_format($cart->price, 2) }} <span>تومان</span></span></ins>
												</div>
											</td>
											<td><input type="number" class="tedad" name="quant[{{ $cart->id }}]" value="{{ $cart->quantity }}" onchange="document.getElementById('cart-form').submit();" /></td>
											<td class="price_alltd" id="price_{{ $cart->id }}">{{ number_format($cart->amount, 2) }} <span>تومان</span></td>
										</tr>
									@endforeach
									<tr>
										<td colspan="5" class="text-right">
											<button class="btn btn-second-masai" type="submit">پرداخت</button>
										</td>
									</tr>
								@else
									<tr>
										<td colspan="5" class="text-center">
											سبد خرید شما خالی است. <a href="{{ route('product-grids') }}" style="color:blue;">ادامه خرید</a>
										</td>
									</tr>
								@endif
							</form>
						</tbody>
					</table>
				</div>
			</div>
			<div class="cart-page-content col-xl-12 col-lg-12 col-md-12">
				<div class="row cart_details">
					<div class="cart-page-content col-xl-8 col-lg-7 col-md-7">
						<form action="{{ route('coupon-store') }}" method="POST">
							@csrf
							<input type="text" name="code" placeholder="کد تخفیف" class="input_second input_all width-200">
							<button type="submit" class="btn btn-main-masai">اعمال</button>
						</form>
						<div class="text_details">
							<p>ارسال رایگان برای سفارش‌های بالای 1 میلیون و 400 هزار تومان</p>
							<p>افزودن کالا به سبد خرید به معنی رزرو آن نیست با توجه به محدودیت موجودی سبد خود را ثبت و خرید را تکمیل کنید.</p>
						</div>
					</div>
					<div class="cart-page-aside col-xl-4 col-lg-5 col-md-5 divider_details">
						<table class="table table_details">
							<tbody>
								<tr>
									<td>بسته‌بندی و ارسال:</td>
									<td>وابسته به نوع ارسال</td>
								</tr>
								<tr>
									<td>قیمت نهایی:</td>
									<td class="total_price">{{ number_format(Helper::totalCartPrice(), 2) }} <span>تومان</span></td>
								</tr>
								<tr>
									<td colspan="2"><a href="{{ route('checkout') }}" class="btn big_btn btn-main-masai">گام بعدی</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script>
function updateCart(element, cartId, unitPrice) {
    let quantity = element.value;
    let newPrice = quantity * unitPrice;
    document.getElementById('price_' + cartId).innerText = newPrice.toLocaleString('fa-IR', { minimumFractionDigits: 2 }) + ' تومان';

    // Update total price
    let totalPrice = 0;
    document.querySelectorAll('.price_alltd').forEach(function(priceElement) {
        totalPrice += parseFloat(priceElement.innerText.replace(/,/g, '').replace(' تومان', ''));
    });

    document.querySelectorAll('.total_price').forEach(function(totalElement) {
        totalElement.innerText = totalPrice.toLocaleString('fa-IR', { minimumFractionDigits: 2 }) + ' تومان';
    });
}
</script>
@endsection