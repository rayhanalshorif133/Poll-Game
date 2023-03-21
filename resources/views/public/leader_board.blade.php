@extends('layouts.web')

@section('head')
@endsection

@section('content')
<section id="top-banner-panel">
    <div class="container">
        <div class="row row-cols-3 row-cols-sm-3 justify-content-center">
            <div class="col-2 text-left">
                <a href="{{route('public.resultPage',$matchId)}}">
                    <img src="{{asset('web/images/back-arrow.png')}}" class="img-fluid">
                </a>
            </div>
            <div class="col-6 text-center">
                <h1 class="text-center" style="font-size:1.8rem;">Leaderboard</h1>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('public.account.index')}}">
                    <img src="{{asset('web/images/profile-img.png')}}" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</section>
<section id="content-body-panel">
    <div class="container mb-5">
        <div class="row justify-content-center">

            <div class="col-12">
                <div class="leaderboard-table">

                    <!--Table-->
                    <table class="table table-hover  table-fixed table-striped border-0 table-borderless">

                        <!--Table head-->
                        <thead>
                            <tr>
                                <th style="text-align: center;" class="rangking-panel">Rangking</th>
                                <th>Mobile No</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaderBoards as $key => $item)
                            @php
                            if($key == 0){
                                $rankClass = 'fstnumber';
                                $scoreClass = 'fstscore';
                            }else if($key == 1){
                                $rankClass = 'scndnumber';
                                $scoreClass = 'sendscore';
                            }else if($key == 2){
                                $rankClass = 'thrdnumber';
                                $scoreClass = 'trrdscore';
                            }else{
                                $rankClass = 'number';
                                $scoreClass = 'tablescore';
                            }
                            @endphp
                            <tr>
                                <td scope="row" class="rangking-panel">
                                    <p class="{{$rankClass}}">
                                        {{$item['rank']}}
                                    </p>
                                </td>
                                <td class="tbl-middel">
                                    {{$item['phone_number']}}
                                </td>
                                <td style="vertical-align: middle;">
                                    <p class="{{$scoreClass}}">
                                        {{$item['score']}}
                                    </p>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <!--Table body-->

                    </table>
                    <!--Table-->
                </div>
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
