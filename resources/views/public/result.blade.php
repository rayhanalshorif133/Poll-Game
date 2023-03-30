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
                    <h1 class="text-center" style="font-size:1.8rem;">{{$match->team1->name}} VS {{$match->team2->name}}</h1>
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
                    <h1 class="text-center" style="font-size:2rem;">{{$match->title}}
                        <hr style="width: 10rem;">
                    </h1>
                    <br>
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
                                    <p class="score">{{$match->total_score($match->id,$account->id)}}</p>
                                    <p class="rank">Rank: {{$match->rank($match->id,$account->id)}}
                                    </p>
                                    <div class="row justify-content-center">
                                        <div class="col-6 right-ans">
                                            Right answer: {{$match->right_answer($match->id,$account->id)}}
                                        </div>
                                        <div class="col-6 wrong-ans">
                                            Wrong answer: {{$match->wrong_answer($match->id,$account->id)}}
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
                        <a href="{{route('public.leaderBoardPage',$match->id)}}" class="result-get-strart-btn">
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
                            <li>
                                {{-- <a href="https://www.facebook.com/sharer/sharer.php?u=https://prnt.sc/n6rHeKACI92W" target="_blank" class="facebook">
                                    <img src="{{asset('web/images/fb-img.png')}}" class="img-fluid">
                                </a> --}}
                                <a href="#" class="facebook">
                                    <img src="{{asset('web/images/fb-img.png')}}" class="img-fluid">
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{asset('web/images/msg-img.png')}}" class="img-fluid">
                                </a>
                            </li>
                            <li><a href="#"><img src="{{asset('web/images/whats-img.png')}}" class="img-fluid"></a></li>
                            <li><a href="#"><img src="{{asset('web/images/inst-img.png')}}" class="img-fluid"></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <span class="image_canvas"></span>
    </section>
@endsection

@push('js')
<script type='text/javascript'>
    $('.t-bottom').click(function () {
            $('.bottom').toggleClass('active');
        });
    $(function(){

        $(".facebook").on('click',function(){

            html2canvas(document.querySelector("#scor-rangkin-wrong-right")).then(canvas => {
                // canvas to Base64
                var base64 = canvas.toDataURL("image/png");
                $('.image_canvas').html('<img src="'+base64+'" />');

                // send to server
                axios.post('/result/set-image', {
                    match: {{$match->id}},
                    account: {{$account->id}},
                    image: base64,
                }).then(function(response) {
                    let url = response.data.data;
                    url = 'https://www.facebook.com/sharer/sharer.php?u='+url;
                    window.open(url, '_blank');

                });

            });
        });

    });
</script>
@endpush
