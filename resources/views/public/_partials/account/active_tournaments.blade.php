<div class="account-table">
    <div class="row row-cols-1 row-cols-sm-2">
        <div class="col-8 active-tourmnt">Active Tournaments</div>
        <div class="col-4">
            <div class="play-more">
                <a href="{{route('public.home')}}"><i class="fa fa-plus" aria-hidden="true"></i> Play more</a>
            </div>
        </div>
    </div>
    <!--Table-->
    <table class="table table-hover table-fixed border-0 table-borderless active-table">
        <!--Table body-->
        <tbody>
            @foreach ($matches as $match)
            @php
            $start_date_time = $match->start_date_time;
            $start_date_time = date('d M Y h:i A', strtotime($start_date_time));
            $start_date = date('d M Y', strtotime($start_date_time));
            $end_date_time = $match->end_date_time;
            $end_date_time = date('d M Y h:i A', strtotime($end_date_time));
            $end_date = date('d M Y', strtotime($end_date_time));
            $now = date('d M Y');
            // difference between two dates
            $datetime1 = new DateTime($start_date_time);
            $datetime2 = new DateTime($end_date_time);
            $interval = $datetime1->diff($datetime2);
            $differenceDays = $interval->format('%a');
            @endphp
            @if ($now < $start_date)
            <tr class="active-play-two">
                <td scope="row" class="futur-match">
                    <p class="text-success">Starts at {{$start_date}}</p>
                    <p class="" style="color: #49BEFF;">
                        {{$match->tournament->name}}
                    </p>
                    <a href="{{route('public.resultPage',$match->id)}}">
                        <p style="color: #0004ff;">
                            {{$match->title}}
                        </p>
                    </a>
                </td>
                <td class="tbl-day" style="vertical-align: middle;">Day 1
                    of {{$differenceDays}}</td>
                <td style="vertical-align: middle;">
                    <p class="ac-rank-text">Rank</p>
                    <p class="acccount-rank">{{$match->rank($match->id,$account->id)}}</p>
                </td>
                <td style="vertical-align: middle;">
                    <p class="ac-score-text">Score</p>
                    <p class="account-score">{{$match->total_score($match->id,$account->id)}}</p>
                </td>
            </tr>
            @endif
            @if ($now == $end_date)
            <tr class="active-play-one">
                <td scope="row" class="ends-match">
                    <p class="text-danger">Ends in
                        <span class="text-center clock exper-time">
                            TIME EXPIRED
                        </span>
                    </p>
                    <p style="color: #49BEFF;">
                        {{$match->tournament->name}}
                    </p>
                    <a href="{{route('public.resultPage',$match->id)}}">
                        <p style="color: #0004ff;">
                            {{$match->title}}
                        </p>
                    </a>
                </td>
                <td class="tbl-day" style="vertical-align: middle;">Day {{$differenceDays}}
                    of {{$differenceDays}}</td>
                <td style="vertical-align: middle;">
                    <p class="ac-rank-text">Rank</p>
                    <p class="acccount-rank">{{$match->rank($match->id,$account->id)}}</p>
                </td>
                <td style="vertical-align: middle;">
                    <p class="ac-score-text">Score</p>
                    <p class="account-score">{{$match->total_score($match->id,$account->id)}}</p>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
        <!--Table body-->
    </table>
    <!--Table-->
</div>
