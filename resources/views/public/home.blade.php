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
            @foreach ($sports as $item)
            <div class="col-md-12  mb-3">
                <div class="card text-white">
                    <img src="{{asset($item->icon)}}" class="card-img img-fluid cricket-bg" alt="...">
                    <div class="card-img-overlay">
                        <div class="cricket-category">
                            <a href="sportspage.html">{{$item->name}}</a>
                        </div>
                        <div class="arrow-fixed-btn" style="background: {{$item->btn_color}};box-shadow: {{$item->btn_shadow}} 0 5px 0;">
                            <a href="sportspage.html" class="cat-arrow-btn">
                                <img src="{{asset('web/images/cat-arrow.png')}}" class="home-arrow-img img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('js')

@endpush
