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
                    <h1 class="text-center" style="font-size:1.8rem;">BAN VS SA</h1>
                </div>
                <div class="col-2 text-right">

                </div>
            </div>

        </div>
    </section>

    <section id="content-body-panel">
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center d-block text-body result-title">Today’s poll has
                        finished!
                        Start again at tomorrow 9:00 pm.</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="scor-rangkin-wrong-right">
        <div class="container mb-3">
            <div class="result-panel">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row justify-content-center mb-2">
                            <div class="col-10 sm-10 col-md-10">
                                <div class="card text-center">
                                    <p class="your-score"> Your Score:</p>
                                    <p class="score">80</p>
                                    <p class="rank">Rank: 12th</p>
                                    <div class="row justify-content-center">
                                        <div class="col-6 right-ans">
                                            Right answer: 8
                                        </div>
                                        <div class="col-6 wrong-ans">
                                            Wrong answer: 2
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="botton-panel-one">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-6 ">
                    <div class="share-btn">
                        <div class="get-strart-btn t-bottom"> <span>Share my result</span> <img
                                src="{{asset('web/images/share-img.png')}}" class="share-img img-fluid"></div>

                    </div>
                </div>


            </div>
        </div>
    </section>
    <section id="botton-panel-two">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <div class="leaderboard-btn">
                        <a href="{{route('public.leaderBoardPage')}}" class="result-get-strart-btn">
                            See full leaderboard
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <section id="shocial-panel">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <nav class="bottom">
                        <ul class="shocial-bg">
                            <li><a href="#"><img src="{{asset('web/images/fb-img.png')}}" class="img-fluid"></a></li>
                            <li><a href="#"><img src="{{asset('web/images/msg-img.png')}}" class="img-fluid"></a></li>
                            <li><a href="#"><img src="{{asset('web/images/whats-img.png')}}" class="img-fluid"></a></li>
                            <li><a href="#"><img src="{{asset('web/images/inst-img.png')}}" class="img-fluid"></a></li>
                        </ul>
                    </nav>
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
