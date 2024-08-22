@extends('frontend.theme2.layouts.master')

@section('title','تک اسپورت || درباره ما')

@section('main-content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs" style="background-color: #f8f9fa; padding: 20px 0;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list" style="display: flex; list-style: none; padding: 0;">
							<li><a href="index1.html" style="color: #61bec3; text-decoration: none;">خانه<i class="ti-arrow-right" style="margin: 0 5px;"></i></a></li>
							<li class="active"><a href="blog-single.html" style="color: #6c757d; text-decoration: none;">درباره ما</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- About Us -->
	<section class="about-us section" style="padding: 60px 0;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="about-content" style="padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
						@php
							$settings=DB::table('settings')->get();
						@endphp
						<h3 style="color: #61bec3;">به <span style="color: #ffc107;">تک اسپورت</span> خوش آمدید</h3>
						<p style="color: #6c757d;">@foreach($settings as $data) {{$data->description}} @endforeach</p>
						<div class="button" style="margin-top: 20px;">
							<a href="{{route('blog')}}" class="btn" style="background-color: #61bec3; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-right: 10px;">وبلاگ ما</a>
							<a href="{{route('contact')}}" class="btn primary" style="background-color: #ffc107; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none;">تماس با ما</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<div class="about-img overlay" style="position: relative; border-radius: 10px; overflow: hidden;">
						<img src="https://finupevent.ir/wp-content/uploads/2020/12/about-us-1.png" alt="@foreach($settings as $data) {{$data->photo}} @endforeach" style="width: 100%; height: auto;">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Us -->


	<!-- Start Shop Services Area -->
	<section class="shop-services section" style="background-color: #f8f9fa; padding: 60px 0;">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service" style="text-align: center; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
						<i class="ti-rocket" style="font-size: 40px; color: #61bec3;"></i>
						<h4 style="color: #61bec3; margin-top: 10px;">ارسال رایگان</h4>
						<p style="color: #6c757d;">سفارشات بالای 100 دلار</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service" style="text-align: center; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
						<i class="ti-reload" style="font-size: 40px; color: #61bec3;"></i>
						<h4 style="color: #61bec3; margin-top: 10px;">بازگشت رایگان</h4>
						<p style="color: #6c757d;">تا 30 روز بازگشت</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service" style="text-align: center; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
						<i class="ti-lock" style="font-size: 40px; color: #61bec3;"></i>
						<h4 style="color: #61bec3; margin-top: 10px;">پرداخت امن</h4>
						<p style="color: #6c757d;">100% پرداخت امن</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service" style="text-align: center; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
						<i class="ti-tag" style="font-size: 40px; color: #61bec3;"></i>
						<h4 style="color: #61bec3; margin-top: 10px;">بهترین قیمت</h4>
						<p style="color: #6c757d;">قیمت تضمینی</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->

	@include('frontend.theme2.layouts.newsletter')
@endsection