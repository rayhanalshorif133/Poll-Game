@extends('layouts.app')

@section('head')
<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #17A2B8!important;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #17A2B8!important;
        border-color: #17A2B8!important;
    }

</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Participate Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('participate.index')}}">Participate</a></li>
                    <li class="breadcrumb-item active">Participate Details</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-primary card-outline">

                    <div class="card-body box-profile">
                        <h3 class="profile-username text-left text-bold">Match Details</h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Title</b> <a class="float-right">{{$participate[0]->match->title}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Team</b> <a class="float-right">
                                    {{$participate[0]->match->team1->name}} vs
                                    {{$participate[0]->match->team2->name}}
                                </a>
                            </li>
                            @php
                            $start_date = date('d M Y h:i A', strtotime($participate[0]->match->start_date_time));
                            $end_date = date('d M Y h:i A', strtotime($participate[0]->match->end_date_time));
                            @endphp
                            <li class="list-group-item">
                                <b>Start Date</b> <a class="float-right">{{$start_date}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>End Date</b> <a class="float-right">{{$end_date}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Time Duration</b> <a class="float-right">
                                    {{$participate[0]->match->timeDiff($participate[0]->match->id)}} Days
                                </a>
                            </li>
                        </ul>
                        <a href="{{route('match.view',$participate[0]->match->id)}}" class="btn btn-primary btn-block"><b>
                                See More <i class="fa-solid fa-angles-right"></i>
                            </b></a>
                    </div>

                </div>

            </div>

            <div class="col-md-7">
                @php
                $total_days = $participate[0]->match->timeDiff($participate[0]->match->id);
                @endphp
                <div class="card card-info card-outline">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            @for ($day = 1 ; $day <= $total_days ; $day++)
                            <li class="nav-item">
                                <a class="nav-link @if($day == 1) active @endif" href="#day-{{$day}}" data-toggle="tab">
                                    Day {{$day}}
                                </a>
                            </li>
                            @endfor
                            <li class="nav-item">
                                <a class="nav-link" href="#leaderBoard" data-toggle="tab">
                                    LeaderBoard
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            @for ($day = 1 ; $day <= $total_days ; $day++)
                                <div class="tab-pane @if($day == 1) active @endif" id="day-{{$day}}">
                                    <div class="table-responsive">
                                        <table class="table" id="participate-{{$day}}" style="width: 100%!important;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Phone Number</th>
                                                    <th scope="col">Score</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>

                                </div>
                            @endfor
                            <div class="tab-pane" id="leaderBoard">
                                <div class="table-responsive">
                                    <table class="table" id="leaderBoardTable" style="width: 100%!important;">
                                        <thead>
                                            <tr>
                                                <th scope="col"># Rangking</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">Score</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection

@push('js')

<script>
    var match_id = {{$participate[0]->match->id}};
    $(function() {
     dayBasedParticipation();
     handleLeaderBoard();
    });
    dayBasedParticipation = () => {

        let days = {{$participate[0]->match->timeDiff($participate[0]->match->id)}};
        for (let index = 1; index <= days; index++) {
            var url = `/participate/${match_id}/${index}/day-wise/`;
            let counter = 0
            dataTable = $("#participate-"+index).DataTable({
                processing: true,
                serverSide: true,
                ajax: url,
                columns: [
                {
                    render: function(data, type, full, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        let phone = row.account? row.account.phone : 'N/A';
                        return phone;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        return row.point ? row.point : 0;
                    },
                    targets: 0,
                }]
            });
        }
    }

    handleLeaderBoard = () => {

        var url = `/participate/${match_id}/leader-board/`;
        let counter = 0
        axios.get(url).then((response) => {
            console.log(response.data);
        }).catch((error) => {
            console.log(error);
        });
        dataTable = $("#leaderBoardTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            columns: [
            {
                render: function(data, type, row) {
                    return row.rank;
                },
                targets: 0,
            },
            {
                render: function(data, type, row) {
                    return row.phone_number;
                },
                targets: 0,
            },
            {
                render: function(data, type, row) {
                    return row.score;
                },
                targets: 0,
            },
        ]
        });
    }


</script>

@endpush
