<!DOCTYPE html>
<html lang="fa">

<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon.png') }}">
<link rel="icon" type="image/png" href="{{ asset('frontend/theme1/assets/img/favicon.png') }}">
<title> @yield('title') </title>
<meta name="description" content="مَسای شاپ ">
<meta name="author" content="دانشگاه">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />

@include('frontend.theme2.layouts.head')

<body class="index-page sidebar-collapse">

    @include('frontend.theme2.layouts.header')

    @yield('main-content')

</body>
@include('frontend.theme2.layouts.footer')

<!-- Mirrored from garzak.ir/garzak_them/Masai/M_01/template_01/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 May 2023 07:57:52 GMT -->

</html>