@extends('layouts.web')

@section('head')
@endsection

@section('content')
<section id="account-top-banner-panel">
    <div class="container">
        <div class="row row-cols-3 row-cols-sm-3 justify-content-center">
            <div class="col-2 text-left">
                <a href="{{route('public.account.index')}}">
                    <img src="{{asset('web/images/back-arrow.png')}}" class="img-fluid ">
                </a>
            </div>
            <div class="col-6 text-center">
                <h1 class="text-center vs-title">Tournament</h1>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('public.settingPage')}}">
                    <img src="{{asset('web/images/setting-img.png')}}" class="img-fluid ">
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
                <!-- ======================= -->
                <div class="account-table history-panel">
                    <div class="row row-cols-1 row-cols-sm-2 mb-3">
                        <div class="col-6 active-tourmnt">All Tournaments</div>
                        <div class="col-6">

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
                                            IPL
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
                                <tr>
                                    <th scope="row" class="tournament-title">
                                        <p class="namevsname">
                                            La liga
                                        </p>
                                    </th>
                                    <td class="total-dayplay" style="vertical-align: middle; text-align: center;">
                                        8(9)</td>
                                    <td class="tounament-rank" style="vertical-align: middle;">
                                        <p class="acfstscore">12</p>
                                    </td>
                                    <td class="tounament-scoure" style="vertical-align: middle;">
                                        <p class="acfstrank">30</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="tournament-title">
                                        <p class="namevsname">
                                            Ban league
                                        </p>
                                    </th>
                                    <td class="total-dayplay" style="vertical-align: middle;">4(6)</td>
                                    <td class="tounament-rank" style="vertical-align: middle;">
                                        <p class="acfstscore">40</p>
                                    </td>
                                    <td class="tounament-scoure" style="vertical-align: middle;">
                                        <p class="acfstrank">25</p>
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

@endpush
