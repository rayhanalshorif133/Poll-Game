@extends('layouts.web')

@section('head')
@endsection

@section('content')
<section id="one-body">
    <div class="container">
        <div id="one-panel">
            <div class="row mb-2">
                <div class="col-12  star-empty">
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="landing-page-footer">
    <section id="point-button">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-6">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="{{route('public.welcome')}}">
                                <div class="cercel-btn active"></div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('public.landing-page-one')}}">
                                <div class="cercel-btn"></div>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="landing2.html">
                                <div class="cercel-btn"></div>
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
    <!-- point-button -->
    <section id="one-button">
        <div class="container">
            <div class="row row-cols-3 row-cols-sm-3 justify-content-center my-2">
                <div class="col-6">
                    <div class="fixed-btn">
                        <a href="{{route('public.landing-page-one')}}" class="get-strart-btn">
                            Get Strated <img src="{{asset('web/images/right-arrow-btn.png')}}" class="arrow-img img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-6 ">
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
@endsection

@push('js')

@endpush
