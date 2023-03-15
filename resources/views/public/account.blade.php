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
                <a href="setting.html">
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
                    <img src="{{asset('web/images/account-img.png')}}" class="img-fluid profile-img">
                </div>
                <div class="profile-info">
                    <p class="profile-mobile">01340000097</p>
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
                <div class="account-table">
                    <div class="row row-cols-1 row-cols-sm-2">
                        <div class="col-8 active-tourmnt">Active Tournaments</div>
                        <div class="col-4">
                            <div class=" play-more">
                                <a href=""><i class="fa fa-plus" aria-hidden="true"></i> Play more</a>
                            </div>
                        </div>
                    </div>
                    <!--Table-->
                    <table class="table table-hover table-fixed border-0 table-borderless active-table">

                        <!--Table body-->
                        <tbody>
                            <tr class="active-play-one">
                                <td scope="row" class="ends-match">
                                    <p class="text-danger">Ends in
                                        <span id="demo" class="text-center clock exper-time"></span>
                                    </p>
                                    <p class="" style="color: #49BEFF;">
                                        Indian
                                        Premiere League
                                    </p>
                                </td>
                                <td class="tbl-day" style="vertical-align: middle;">Day 1
                                    of 7</td>
                                <td style="vertical-align: middle;">
                                    <p class="ac-rank-text">Rank</p>
                                    <p class="acccount-rank">124</p>
                                </td>
                                <td style="vertical-align: middle;">
                                    <p class="ac-score-text">Score</p>
                                    <p class="account-score">25</p>
                                </td>
                            </tr>

                            <tr class="active-play-two">
                                <td scope="row" class="futur-match">
                                    <p class="text-success">Starts at tomorrow 9PM</p>
                                    <p class="" style="color: #49BEFF;">
                                        European
                                        Football league
                                    </p>
                                </td>
                                <td class="tbl-day" style="vertical-align: middle;">Day 1
                                    of 7</td>
                                <td style="vertical-align: middle;">
                                    <p class="ac-rank-text">Rank</p>
                                    <p class="acccount-rank">- -</p>
                                </td>
                                <td style="vertical-align: middle;">
                                    <p class="ac-score-text">Score</p>
                                    <p class="account-score">- -</p>
                                </td>
                            </tr>
                        </tbody>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>
                <!-- ======================= -->
                <div class="account-table">
                    <div class="row row-cols-1 row-cols-sm-2 mb-3">
                        <div class="col-6 active-tourmnt">Previous Tournaments</div>
                        <div class="col-6">
                            <div class=" play-more">
                                <a href="history.html"> See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="account-leaderboard-table">
                        <!--Table-->
                        <table class="table table-hover  table-fixed table-striped border-0 table-borderless">

                            <!--Table head-->
                            <thead>
                                <tr class="previous-title-panel">
                                    <th style="text-align: left;" style="vertical-align: middle;">Tournament</th>
                                    <th class="day-play" style="vertical-align: middle; ">Days Played
                                        (Total days)</th>
                                    <th style="vertical-align: middle;">Rank</th>
                                    <th style="vertical-align: middle;">Score</th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                                <tr>
                                    <th scope="row" class="tournament-title">
                                        <p class="namevsname">
                                            Ban vs SA
                                        </p>
                                    </th>
                                    <td class="total-dayplay" style="vertical-align: middle; text-align: center;">
                                        5(7)</td>
                                    <td class="tounament-rank" style="vertical-align: middle;">
                                        <p class="acfstscore">15</p>
                                    </td>
                                    <td class="tounament-scoure" style="vertical-align: middle;">
                                        <p class="acfstrank">50</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="tournament-title">
                                        <p class="namevsname">
                                            Indian league
                                        </p>
                                    </th>
                                    <td class="total-dayplay" style="vertical-align: middle;">3(10)</td>
                                    <td class="tounament-rank" style="vertical-align: middle;">
                                        <p class="acfstscore">50</p>
                                    </td>
                                    <td class="tounament-scoure" style="vertical-align: middle;">
                                        <p class="acfstrank">10</p>
                                    </td>
                                </tr>
                            </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->
                    </div>
                    <!--Table-->
                </div>
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
