<div class="account-table">
    <div class="row row-cols-1 row-cols-sm-2 mb-3">
        <div class="col-6 active-tourmnt">Previous Tournaments</div>
        <div class="col-6">
            <div class=" play-more">
                <a href="{{route('public.history.index')}}"> See all</a>
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
                @foreach ($matches as $key => $match)
                @php
                $start_date_time = $match->start_date_time;
                $start_date_time = date('d M Y h:i A', strtotime($start_date_time));
                $start_date = date('d M Y', strtotime($start_date_time));
                $end_date_time = $match->end_date_time;
                $end_date_time = date('d M Y h:i A', strtotime($end_date_time));
                $end_date = date('d M Y', strtotime($end_date_time));
                $now = date('d M Y');
                // difference between two dates
                @endphp
                @if ($now > $end_date)
                    <tr>
                        <th scope="row" class="tournament-title">
                            <p class="namevsname">
                                {{$match->team1->name}} vs {{$match->team2->name}}
                                <a href="{{route('public.resultPage',$match->id)}}" style="font-size: 1rem;">
                                    <span class="badge badge-pill badge-success">Result</span>
                                </a>
                            </p>
                            {{-- <a href="{{route('public.resultPage',$match->id)}}">
                                See Result
                            </a> --}}
                        </th>
                        <td class="total-dayplay" style="vertical-align: middle; text-align: center;">
                            {{$match->total_participate($match->id,$account->id)}}({{$match->timeDiff($match->id)}})
                        </td>
                        <td class="tounament-rank" style="vertical-align: middle;">
                            <p class="acfstscore">
                                {{$match->rank($match->id,$account->id)}}
                            </p>
                        </td>
                        <td class="tounament-scoure" style="vertical-align: middle;">
                            <p class="acfstrank">
                                {{$match->total_score($match->id,$account->id)}}
                            </p>
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
            <!--Table body-->
        </table>
        <!--Table-->
    </div>
    <!--Table-->
</div>
