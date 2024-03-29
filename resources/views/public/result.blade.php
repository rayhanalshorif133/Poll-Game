@extends('layouts.web')

@section('head')
<style>
    .waiting{
        background: transparent;
        border-radius: 10px;
        border: 1px solid red !important;
        text-transform: uppercase;
        font-size: 1.2rem;
        padding: 0.3rem 1rem;
        font-weight: bold;
    }
    .waiting span{
        animation: blink 1s linear infinite;
    }
    .waiting span:nth-child(1){
        animation-delay: 0.3s;
    }
    .waiting span:nth-child(2){
        animation-delay: 0.6s;
    }
    .waiting span:nth-child(3){
        animation-delay: 0.9s;
    }
    @keyframes blink {
        0% {
            opacity: 0;
            transform: scale(1);
        }
        50% {
            opacity: 1;
            transform: scale(1.5);
        }
    }
</style>
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
                    @php
                    $next_match_date = '';
                    $end_date = date('d M Y', strtotime($match->end_date_time));
                    $now_date = date('d M Y');
                    $end_time = date('h:i A', strtotime($match->end_date_time));
                    $now_time = date('h:i A');
                    if($next_match){
                        $next_match_date = date('d M Y h:i A', strtotime($next_match->start_date_time));
                    }
                    @endphp
                    <h1 class="text-center" style="font-size:2rem;">{{$match->title}}
                        <hr style="width: 10rem;">
                    </h1>
                    <br>
                    <h2 class="text-center d-block text-body result-title">
                        @if($end_date == $now_date && $end_time < $now_time)
                        Today’s poll has
                        finished!
                        @endif
                        @if($next_match_date)
                        Start again at {{$next_match_date}}
                        @else
                        <span class="waiting">Waiting <span>.</span><span>.</span><span>.</span></span> for the next poll
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <section id="scor-rangkin-wrong-right">
        <div class="container mb-3">
            <div class="result-panel" id="result-panel-board">
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
                                <a href="#" class="facebook">
                                    <img src="{{asset('web/images/fb-img.png')}}" class="img-fluid">
                                </a>

                            </li>
                            <li>
                                <a href="#" class="messenger">
                                    <img src="{{asset('web/images/msg-img.png')}}" class="img-fluid">
                                </a>
                            </li>
                            <li><a href="#" class="whatsapp"><img src="{{asset('web/images/whats-img.png')}}" class="img-fluid"></a></li>
                            <li><a href="#" class="instagram"><img src="{{asset('web/images/inst-img.png')}}" class="img-fluid"></a></li>
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
            canvasToImageAndSendBackend('https://www.facebook.com/sharer/sharer.php?u='); // send to facebook
        });

        $(".messenger").on('click',function(){
            canvasToImageAndSendBackend('fb-messenger://share/?link='); // send to messenger
        });
        $(".whatsapp").on('click',function(){
            canvasToImageAndSendBackend('https://api.whatsapp.com/send?text='); // send to whatsapp
        });
        $(".instagram").on('click',function(){
            canvasToImageAndSendBackend('https://www.instagram.com/?url='); // send to instagram
        });

    });

    canvasToImageAndSendBackend = (basedUrl) => {
        html2canvas(document.querySelector("#result-panel-board")).then(canvas => {
            // canvas to Base64
            var base64 = canvas.toDataURL("image/png");
            // send to server
            axios.post('/result/set-image', {
            match: {{$match->id}},
            account: {{$account->id}},
            image: base64,
            }).then(function(response) {
            let url = response.data.data.image;
            url = "http://localhost:3000/" + url;
            url = 'https://prnt.sc/W-UT4skcBRJq';
            window.open(url, '_blank');
            url = basedUrl+url;
            window.open(url, '_blank');
            });
        });
    }
</script>
@endpush
