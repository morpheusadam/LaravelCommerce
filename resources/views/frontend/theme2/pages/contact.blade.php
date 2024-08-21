@extends('frontend.theme2.layouts.master')
@section('title','تک اسپورت || تماس با ما ')

@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">خانه<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="javascript:void(0);">تماس با ما</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main contact-form-main">
								<div class="title contact-title">
									@php
										$settings=DB::table('settings')->get();
									@endphp
									<h4>با ما در تماس باشید</h4>
									<h3>پیام خود را برای ما بنویسید @auth @else<span style="font-size:12px;" class="text-danger">[ابتدا باید وارد شوید]</span>@endauth</h3>
								</div>
								<form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
									@csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group contact-form-group">
												<label>نام شما<span>*</span></label>
												<input name="name" id="name" type="text" placeholder="نام خود را وارد کنید">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group contact-form-group">
												<label>موضوع<span>*</span></label>
												<input name="subject" type="text" id="subject" placeholder="موضوع را وارد کنید">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group contact-form-group">
												<label>ایمیل شما<span>*</span></label>
												<input name="email" type="email" id="email" placeholder="ایمیل خود را وارد کنید">
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group contact-form-group">
												<label>تلفن شما<span>*</span></label>
												<input id="phone" name="phone" type="number" placeholder="تلفن خود را وارد کنید">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group contact-form-group message">
												<label>پیام شما<span>*</span></label>
												<textarea name="message" id="message" cols="30" rows="9" placeholder="پیام خود را وارد کنید"></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group contact-form-group button">
												<button type="submit" class="btn btn-primary">ارسال پیام</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head contact-single-head">
								<div class="single-info contact-single-info">
									<i class="fa fa-phone"></i>
									<div>
										<h4 class="title">همین حالا تماس بگیرید:</h4>
										<ul>
											<li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
										</ul>
									</div>
								</div>
								<div class="single-info contact-single-info">
									<i class="fa fa-envelope-open"></i>
									<div>
										<h4 class="title">ایمیل:</h4>
										<ul>
											<li><a href="mailto:info@yourwebsite.com">@foreach($settings as $data) {{$data->email}} @endforeach</a></li>
										</ul>
									</div>
								</div>
								<div class="single-info contact-single-info">
									<i class="fa fa-location-arrow"></i>
									<div>
										<h4 class="title">آدرس ما:</h4>
										<ul>
											<li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
	
	<!-- Map Section -->
	<div class="map-section">
		<div id="myMap">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3238.907768207073!2d51.38897331525892!3d35.68919798019256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e017877a1a1b1%3A0x4b7b1b1b1b1b1b1b!2sTehran%2C%20Iran!5e0!3m2!1sen!2s!4v1633023330171!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
	<!--/ End Map Section -->
	
	<!-- Start Shop Newsletter  -->
	@include('frontend.theme2.layouts.newsletter')
	<!-- End Shop Newsletter -->
	<!--================Contact Success  =================-->
	<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-success">متشکریم!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-success">پیام شما با موفقیت ارسال شد...</p>
			</div>
		  </div>
		</div>
	</div>
	
	<!-- Modals error -->
	<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-warning">متاسفیم!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-warning">مشکلی پیش آمده است.</p>
			</div>
		  </div>
		</div>
	</div>


<style>
	.modal-dialog .modal-content .modal-header{
		position:initial;
		padding: 10px 20px;
		border-bottom: 1px solid #e9ecef;
	}
	.modal-dialog .modal-content .modal-body{
		height:100px;
		padding:10px 20px;
	}
	.modal-dialog .modal-content {
		width: 50%;
		border-radius: 0;
		margin: auto;
	}
	.contact-us .contact-form-main {
		background: #f9f9f9;
		padding: 30px;
		border-radius: 10px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}
	.contact-us .contact-title h4, .contact-us .contact-title h3 {
		color: #333;
	}
	.contact-us .contact-form-group label {
		font-weight: bold;
		color: #333;
	}
	.contact-us .contact-form-group input, .contact-us .contact-form-group textarea {
		width: 100%;
		padding: 10px;
		border: 1px solid #ddd;
		border-radius: 5px;
		margin-top: 5px;
	}
	.contact-us .contact-form-group button {
		background: #61bec3;
		color: #fff;
		padding: 10px 20px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		transition: background 0.3s;
	}
	.contact-us .contact-form-group button:hover {
		background: #4aa7b0;
	}
	.contact-single-head .contact-single-info {
		margin-bottom: 20px;
		display: flex;
		align-items: center;
	}
	.contact-single-head .contact-single-info i {
		font-size: 24px;
		color: #61bec3;
		margin-right: 10px;
		padding: 5px;
	}
	.contact-single-head .contact-single-info h4 {
		font-size: 18px;
		color: #333;
		margin-bottom: 5px;
	}
	.contact-single-head .contact-single-info ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}
	.contact-single-head .contact-single-info ul li {
		color: #555;
	}
</style>
@endsection