@extends('frontend.theme2.layouts.master')

@section('title','E-SHOP || تأیید کد')

@section('main-content')
<main class="wrapper default">
    <div class="container">
        <div class="row">
            <div class="main-content login_content col-12 col-md-7 col-lg-5 mx-auto">
                <header class="card-header">
                    <h3 class="card-title"><span>تأیید کد</span></h3>
                </header>
                <div class="login_box">
                    <!-- Form -->
                    <form class="form" method="post" action="{{route('verify.submit')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-account-title"><span>*</span> کد تأیید</div>
                                <div class="form-account-row">
                                    <input class="input_second input_all" type="text" name="code" placeholder="کد تأیید" required="required">
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 text--center">
                                <button type="submit" class="btn big_btn btn-main-masai">تأیید</button>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection