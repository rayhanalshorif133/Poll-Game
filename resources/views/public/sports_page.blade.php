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
                <a href="">
                    <img src="{{asset('web/images/profile-img.png')}}" class="img-fluid">
                </a>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col-md-12 text-center mb-2">
                @if(count($tournaments) > 0)
                <h1 class="select-tournament-favorite-name">Select Your <span
                        style="color:#000;border: #FF0099 solid 1px; padding: 1px 5px; border-radius: 50px;">Tournament!</span>

                </h1>
                @else
                <h1 class="select-tournament-favorite-name">No <span style="color:#000;border: #FF0099 solid 1px; padding: 1px 5px; border-radius: 50px;">Tournaments</span> Available Now!</h1>
                @endif
            </div>
        </div>
    </div>
    @foreach ($tournaments as $tournament)
    <div class="container mb-5 tornament-body">
        <div class=" tournament-panel">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-left d-block text-body turnament-title">
                        {{$tournament->name}}
                    </h2>
                    <div class="leagu-match-table">

                        <table class="table table-hover  table-fixed table-striped border-0 table-borderless">

                            <tbody>
                                <tr>
                                    <td scope="row" class="int-tbl-left" style="vertical-align: middle;">
                                        <img src="{{asset('web/images/right-rider-img.png')}}"
                                            class="card-img img-fluid flag-one float-right d-block" alt="...">
                                    </td>
                                    <td class="int-tbl-middel" style="vertical-align: middle;">
                                        <h2 class="vs-one">VS</h2>
                                    </td>
                                    <td style="vertical-align: middle;" class="int-tbl-right">
                                        <img src="{{asset('web/images/royel-img.png')}}" class="card-img img-fluid flag-two"
                                            alt="...">
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
                    <p class="text-center d-block tounament-datetime">Tournaments starts in
                        <span id="demo" class="text-center clock exper-time"></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="play-btn-one">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="text-center d-block">
                        <a href="" data-toggle="modal" data-target="#modal1">
                            Play Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>


<!-- Modal one-->
<div class="modal fade subscribe-panel" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Title"
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
                    <a href="#" class="modal-get-strart-btn">
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
            document.getElementById("demo").innerHTML = days + "d " + hours + "h " + minutes + "m"; //+ seconds + "s"

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "TIME EXPIRED";
            }
        }, 1000);

        // ===================================
        // Set the date we're counting down to
        var countDownDateone = new Date("Feb 17, 2023 00:00:00").getTime();

        // Update the count down every 1 second
        var xone = setInterval(function () {
            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distanceone = countDownDateone - now;

            // Time calculations for days, hours, minutes and seconds
            var day = Math.floor(distanceone / (1000 * 60 * 60 * 24));
            var hour = Math.floor((distanceone % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minute = Math.floor((distanceone % (1000 * 60 * 60)) / (1000 * 60));
            var second = Math.floor((distanceone % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demoone").innerHTML = day + "d " + hour + "h " + minute + "m"; //+ second + "s"

            // If the count down is over, write some text
            if (distanceone < 0) {
                clearInterval(xone);
                document.getElementById("demoone").innerHTML = "TIME EXPIRED";
            }
        }, 1000);


</script>
@endpush
