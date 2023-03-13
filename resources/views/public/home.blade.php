@extends('layouts.web')

@section('head')
@endsection

@section('content')
<section id="category-panel ">
    <div class="container my-4">
        <div class="row row-cols-3 row-cols-sm-3 justify-content-center mb-3 home-panel">
            <div class="col-2 text-left"></div>
            <div class="col-6 text-center"></div>
            <div class="col-2 text-right pull-right" style="padding: 0px;"><a href="account.html"><img
                        src="{{asset('web/images/profile-img.png')}}" class="img-fluid"></a></div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-md-12 text-center">
                <h1 class="select-favorite-name">Select Your <span
                        style="color:#fff;background-color: #FF0099; padding: 1px 5px; border-radius: 50px;">Favorite</span>Sport!
                </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center mb-2 sports-all-panel">
            <div class="col-md-12  mb-3">
                <div class="card text-white">
                    <img src="{{asset('web/images/c1-img.png')}}" class="card-img img-fluid cricket-bg" alt="...">
                    <div class="card-img-overlay">
                        <div class="cricket-category">
                            <a href="sportspage.html">Cricket</a>
                        </div>
                        <div class="arrow-fixed-btn">
                            <a href="sportspage.html" class="cat-arrow-btn">
                                <img src="{{asset('web/images/cat-arrow.png')}}" class="home-arrow-img img-fluid">

                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12  mb-3">
                <div class="card text-white">
                    <img src="{{asset('web/images/football-img.png')}}" class="card-img img-fluid football-bg" alt="...">
                    <div class="card-img-overlay">
                        <div class="cricket-category">
                            <a href="sportspage.html">Football</a>
                        </div>
                        <div class="arrow-fixed-btn-football">
                            <a href="sportspage.html" class="cat-arrow-btn">
                                <img src="{{asset('web/images/cat-arrow.png')}}" class="home-arrow-img img-fluid">

                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="card text-white">
                    <img src="{{asset('web/images/tanise-img.png')}}" class="card-img img-fluid tannis-bg" alt="...">
                    <div class="card-img-overlay">
                        <div class="cricket-category">
                            <a href="">Tennis</a>
                        </div>
                        <div class="arrow-fixed-btn-tanise">
                            <a href="sportspage.html" class="cat-arrow-btn">
                                <img src="{{asset('web/images/cat-arrow.png')}}" class="home-arrow-img img-fluid">

                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection

@push('js')

@endpush
