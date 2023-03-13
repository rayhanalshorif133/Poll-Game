@extends('layouts.web')

@section('head')
@endsection

@section('content')

@endsection
<section id="one-body">
    <div class="container">
        <div id="landing2-one-panel">
            <div class="row mb-2"></div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<footer id="landing-page-footer">
    <section id="point-button">
        <div class="container-fluid">
            <div class="row justify-content-center mb-3">
                <div class="col-6">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="{{route('public.welcome')}}">
                                <div class="cercel-btn"></div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('public.landing-page-one')}}">
                                <div class="cercel-btn"></div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('public.landing-page-two')}}">
                                <div class="cercel-btn active"></div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="final.html">
                                <div class="cercel-btn"></div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- point-button -->

    <section id="one-button">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-6 text-right get-next-btn ">
                    <div class="fixed-btn">
                        <a href="final.html" class="get-strart-btn">
                            Next <img src="{{asset('web/images/right-arrow-btn.png')}}" class="arrow-img img-fluid">
                        </a>
                    </div>

                </div>
                <div class="col-6 get-next-btn">
                    <div class="skip-fixed-btn">
                        <a href="home.html" class="skip-btn">
                            Skip
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</footer>
@push('js')

@endpush
