@extends('layouts.web')

@section('head')
@endsection

@section('content')
<section id="category-panel sport-body">
    <div class="container">
        <div class="row row-cols-3 row-cols-sm-3 justify-content-center my-4 ">
            <div class="col-2 text-left pull-left arrow-icon">
                <a href="{{route('public.home')}}">
                    <img src="{{asset('web/images/back-arrow.png')}}" class="img-fluid">
                </a>
            </div>
            <div class="col-6 text-center">
            </div>
            <div class="col-2 text-right pull-right profile-icon">
                <a href="{{route('public.account.index')}}">
                    <img src="{{asset('web/images/profile-img.png')}}" class="img-fluid">
                </a>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col-md-12 text-center mb-2">
                @if(count($matches) > 0)
                <h1 class="select-tournament-favorite-name">Select Your <span
                        style="color:#000;border: #FF0099 solid 1px; padding: 1px 5px; border-radius: 50px;">Tournament!</span>

                </h1>
                @else
                <h1 class="select-tournament-favorite-name">No <span style="color:#000;border: #FF0099 solid 1px; padding: 1px 5px; border-radius: 50px;">Tournaments</span> Available Now!</h1>
                @endif
            </div>
        </div>
    </div>
    @foreach ($matches as $key => $match)
    @php
        $count = $key%2;
        if($count == 0){
            $classBody = 'tornament-body';
            $classPanel = 'tournament-panel';
            $classTable = 'leagu-match-table';
            $classPlayBtn = 'play-btn-one';
        }else{
            $classBody = 'match-panel-body';
            $classPanel = 'match-panel';
            $classTable = 'international-match-table';
            $classPlayBtn = 'match-play-btn-one';
        }

    @endphp
    <div class="container mb-5 {{$classBody}}">
        <div class="{{$classPanel}}">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-left d-block text-body turnament-title">
                        {{$match->tournament->name}}
                    </h2>
                    <div class="{{$classTable}}">
                        <table class="table table-hover  table-fixed table-striped border-0 table-borderless">
                            <tbody>
                                <tr>
                                    <td scope="row" class="int-tbl-left" style="vertical-align: middle;">
                                        {{-- {{$match->team1->logo}} --}}
                                        <img src="{{asset($match->team1->logo)}}"
                                            class="card-img img-fluid flag-one float-right d-block" alt="{{$match->team1->name}}">
                                        <br><p class="text-center">{{$match->team1->name}}</p>
                                    </td>
                                    <td class="int-tbl-middel" style="vertical-align: middle;">
                                        <h2 class="vs-one">VS</h2>
                                    </td>
                                    <td style="vertical-align: middle;" class="int-tbl-right">
                                        <img src="{{asset($match->team2->logo)}}" class="card-img img-fluid flag-two"
                                            alt="{{$match->team2->name}}">
                                       <br>
                                        <p class="text-center">{{$match->team2->name}}</p>
                                    </td>
                                </tr>

                            </tbody>
                            <!--Table body-->

                        </table>
                        <!--Table-->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12  my-2">
                    <p class="text-center d-block tounament-datetime">
                        Tournaments <span class="startOrEnd-{{$key+1}}">starts</span> in
                        @php
                            $start_date = $match->start_date_time;
                            $start_date = date('d M Y h:i A', strtotime($start_date));
                            $end_date = $match->end_date_time;
                            $end_date = date('d M Y h:i A', strtotime($end_date));
                        @endphp
                        @if($match->start_date_time > now())
                        <span id="start_in-{{$key+1}}" class="text-center clock" data-endDate="{{$end_date}}">
                            {{$start_date}}
                        </span>
                        @endif
                        <span class="live-view-{{$key+1}} d-none"><a href="" style="color: #FF0000;">Live</a></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="{{$classPlayBtn}}">
            <div class="row justify-content-center ">
                <div class="col-md-12 play_now-{{$key+1}} d-none">
                    @if($match->tournament->is_participated)
                    <div class="text-center d-block">
                        <a href="{{route('public.poll_page',$match->id)}}">
                            Play Now
                        </a>
                    </div>
                    @else
                    <div class="text-center d-block">
                        <a href="" class="playNowModal" data-toggle="modal" id="matchId-{{$match->id}}" data-target="#playNowModal">
                            Play Now
                        </a>
                    </div>
                    @endif
                </div>
                <div class="col-md-12 waiting-{{$key+1}}">
                    <div class="text-center d-block">
                        <a href="">
                            Waiting ...
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach
</section>


<!-- Modal one-->
<div class="modal fade subscribe-panel" id="playNowModal" tabindex="-1" role="dialog" aria-labelledby="playNowModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body subscribe-btn">
                <ul class="text-center">
                    <li>1. Play & win attractive prize</li>
                    <li>2. Subscription will cost 10 tk</li>
                </ul>
            </div>
            <div class="modal-footer text-center d-block modal-sub-btn">
                <div class="cotinue-fixed-btn">
                    <a href="" class="modal-get-strart-btn">
                        Continue
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type='text/javascript'>

   var totalMatch = {{count($matches)}};
    $(function(){
        countDown();
        setRouteInContinueButton();
    });

    function setRouteInContinueButton(){
        $(".playNowModal").click(function(){
            let matchId = $(this).attr('id').split('-')[1];
            let route = `/poll/${matchId}`;
            $(".modal-get-strart-btn").attr('href', route);
        });
    }



    function countDown(){

         for (let index = 1; index <= totalMatch; index++) {
             $(`#start_in-${index}`).each(function(item){
                var startDate = $(this).text();
                var countDownDate = new Date(startDate).getTime();
                var thisStartIndex = $(this);
                $(this).html(''); // set empty
                // end Date
                var endDate = $(this).data('enddate');
                var countDownEndDate = new Date(endDate).getTime();
                var distance = getDistance(countDownDate);
                var endDistance = getDistance(countDownEndDate);
                sessionStorage.setItem(`#start_in-${index}`, distance);
                sessionStorage.setItem(`#end_in-${index}`, endDistance);

                // Update the count down every 1 second
                var x = setInterval(function () {
                    var now = new Date().getTime();
                    distance = getDistance(countDownDate);
                    if(countDownEndDate < now){
                        thisStartIndex.html('TIME EXPIRED');
                        $(`.waiting-${index}`).find('a').html('THE END');
                        return false;
                    }
                    let calculateTime = timeCalculations(distance);
                    thisStartIndex.html(calculateTime);
                    var getSessionDistance = sessionStorage.getItem(`#start_in-${index}`);
                    if(getSessionDistance < distance){
                        clearInterval(x);
                        let calculateEndTime = timeCalculations(endDistance);
                        thisStartIndex.html(calculateEndTime);
                        setIntervalEnds(index, endDistance);
                        $(`.startOrEnd-${index}`).html('ends');
                        $(`.play_now-${index}`).removeClass('d-none');
                        $(`.live-view-${index}`).removeClass('d-none');
                        $(`.waiting-${index}`).addClass('d-none');
                    }else{
                        sessionStorage.setItem(`#start_in-${index}`, distance);
                    }
                }, 1000);

            });
        }
    }


    function setIntervalEnds(index,endDistance){
        let counter = 0;
        // let calculateTime = timeCalculations(endDistance);
        var initTime = new Date(endDistance);
        var y = setInterval(function () {
            counter++;
            var newTime = new Date(initTime.getTime() - counter * 1000);
            let calculateTime = timeCalculations(newTime);
            let countInitTime = new Date(newTime).getTime();
            $(`#start_in-${index}`).html(calculateTime);
            var getSessionDistance = sessionStorage.getItem(`#end_in-${index}`);
            console.log(getSessionDistance);
            if(getSessionDistance < 1200){
                clearInterval(y);
                location.reload();
                return false;
            }else{
                sessionStorage.setItem(`#end_in-${index}`, countInitTime);
            }
        }, 1000);
    }




    function timeCalculations(distance)
    {
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        return days + "d " + hours + "h " + minutes + "m " + seconds + "s";
    }

    function getDistance(date){
        var now = new Date().getTime();
        let claculateDistance;
        if(now > date){
            claculateDistance = now - date;
        }else{
            claculateDistance = date - now;
        }
        return claculateDistance;
    }

</script>
@endpush
