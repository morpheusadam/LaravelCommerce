<!DOCTYPE html>
<html lang="fa">
<head>
	@include('frontend.layouts.head')	
</head>
<body class="js">
	
	<!-- پیش‌بارگذار -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- پایان پیش‌بارگذار -->
	
	@include('frontend.layouts.notification')
	<!-- هدر -->
	@include('frontend.layouts.header')
	<!--/ پایان هدر -->
	@yield('main-content')
	
	@include('frontend.layouts.footer')

</body>
</html>