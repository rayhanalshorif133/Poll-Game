@extends('layouts.web')

@section('head')
@endsection

@section('content')
<section id="top-banner-panel">
    <div class="container">
        <div class="row row-cols-3 row-cols-sm-3 justify-content-center">
            <div class="col-2 text-left">
                <a href="{{route('public.account.index')}}">
                    <img src="{{asset('web/images/back-arrow.png')}}" class="img-fluid">
                </a>
            </div>
            <div class="col-6 text-center">
                <h1 class="text-center" style="font-size:1.8rem;">Setting</h1>
            </div>
            <div class="col-2 text-right">

            </div>
        </div>
    </div>
</section>


<section id="content-body-panel">
    <div class="container mb-5">

        <div class="row row-cols-1 row-cols-sm-2 mb-3">
            <div class="col-6 active-tourmnt">Notification</div>
            <div class="col-6">
                <div class="custom-control custom-switch custom-switch-panel">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1"></label>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 mb-3">
            <div class="col-12 tm-condition">Terms & Conditions</div>
            <div class="col-12">
                <div class="term-con-panel">
                    <p>1. Our demo service is provided on an "as is" and "as available" basis.</p>
                    <p>2. We make no warranty that our demo service will meet your requirements or be available on
                        an
                        uninterrupted, secure, or
                        error-free basis.</p>
                    <p>3. You understand that any data or information you provide to us through the demo service is
                        at
                        your
                        own risk.</p>
                    <p>4. We reserve the right to discontinue the demo service at any time without notice.</p>
                    <p>5. By using the demo service, you agree to our terms and conditions and privacy policy.</p>

                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 mb-3">
            <div class="col-12 faq-title">FAQ</div>
            <div class="col-12">
                <div class="faq-panel">
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script type='text/javascript'>
    $('.t-bottom').click(function () {
            $('.bottom').toggleClass('active');
        });
</script>
@endpush
