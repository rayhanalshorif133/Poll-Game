@extends('layouts.web')

@section('head')
@endsection

@section('content')
<section id="account-top-banner-panel">
    <div class="container">
        <div class="row row-cols-3 row-cols-sm-3 justify-content-center">
            <div class="col-2 text-left">
                <a href="{{route('public.leaderBoardPage')}}">
                    <img src="{{asset('web/images/back-arrow.png')}}" class="img-fluid">
                </a>
            </div>
            <div class="col-6 text-center">
                <h1 class="text-center" style="font-size:1.8rem;">ACCOUNTS</h1>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('public.settingPage')}}">
                    <img src="{{asset('web/images/setting-img.png')}}" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</section>
<section id="content-body-panel">
    <div class="container profile-body">
        <div class="row row-cols-1 row-cols-sm-2 justify-content-center">
            <div class="col-6" style="text-align: center; display: block;">
                <div class="account-img-panel">
                    @if($account->avatar)
                    <img src="{{asset($account->avatar)}}" class="img-fluid profile-img">
                    @else
                    <img src="{{asset('web/images/account-img.png')}}" class="img-fluid profile-img">
                    @endif
                </div>
                <div class="profile-info">
                    <p class="profile-mobile">{{$account->phone}}</p>
                    <h3 class="font-weight-bold my-tournament">My Tournaments</h3>

                </div>
            </div>
            <div class="col-6 ">
                <div class="total-score-panel float-right">
                    <!-- <i class="fas fa-coins"></i> -->
                    <img src="{{asset('web/images/subway_coin.png')}}" class="img-fluid coin-img">
                    <div class="account-score-number">
                        <p>50</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12">
                @include('public._partials.account.active_tournaments')
                @include('public._partials.account.previous_tournaments')
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')

<script type='text/javascript'>
    // Set the date we're counting down to
        var countDownDate = new Date("Feb 12, 2023 00:00:00").getTime();
        // Update the count down every 1 second
        var x = setInterval(function () {
            // Get today's date and time
            var now = new Date().getTime();
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = hours + "h " + minutes + "m"; //+ seconds + "s"
            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "TIME EXPIRED";
            }
        }, 1000);
</script>
<script type='text/javascript'>
    $('.t-bottom').click(function () {
            $('.bottom').toggleClass('active');
        });
</script>

@endpush
