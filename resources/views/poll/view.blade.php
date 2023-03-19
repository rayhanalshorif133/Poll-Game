@extends('layouts.app')

@section('title')
| Poll View
@endsection
@section('head')
<style>
    .default_activated {
        font-size: 12px;
        font-weight: 700;
    }

    .w-35 {
        width: 35%;
    }
    .bd-3{
        border: 1px solid #ccc;
        padding: 5px;
    }

</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    Match Details
                </div>
                <div class="card-body">
                    <p>
                        <b>Match Title: </b>
                        <span class="float-right">
                            <a href="{{ route('match.view',$poll->match->id) }}">
                                {{ $poll->match->title }}
                            </a>
                        </span>
                    </p>
                    <ul class="list-group list-group-unbordered my-3">
                        <li class="list-group-item">
                            <b>Tournament Name: </b> <span class="float-right">{{ $poll->match->tournament->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Team 1: </b> <span class="float-right">{{ $poll->match->team1->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Team 2: </b> <span class="float-right">{{ $poll->match->team2->name }}</span>
                        </li>
                    </ul>
                    {{-- btn --}}
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('match.view',$poll->match->id) }}" class="btn btn-sm btn-primary btn-block">
                                More Details <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-sm" href="#poll_details" data-toggle="tab">Poll Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm" href="#poll_update" data-toggle="tab">Update</a>
                    </li>
                </ul>
            </div>
            <div class="card-body tab-content">
                <div class="tab-pane active" id="poll_details">
                   <p>
                        <b>Question: </b> <span class="float-right">{{ $poll->question }}</span>
                    </p>
                    {{-- poll images --}}
                    @if(count($poll->images) > 0)
                    <p>
                        <b>Question's Images: </b>
                        <div class="row">
                            @foreach ($poll->images as $item)
                            <div class="col-md-2 bd-3 m-2">
                                <img src="{{ asset($item) }}" alt="" class="img-fluid p-2">
                            </div>
                            @endforeach
                        </div>
                    </p>
                    @endif
                    <b>Question's Options: </b>
                    {{-- poll images --}}
                    <ul class="list-group list-group-unbordered my-3">
                        @for ($i = 1; $i <= 4; $i++)
                        @php
                            $option = 'option_'.$i;
                            if($option == $poll->answer)
                                $answer = $poll->$option;
                        @endphp
                        @if ($poll->$option)
                            <li class="list-group-item">
                                <b>Option {{$i}}: </b> <span class="float-right">
                                    {{ $poll->$option }}
                                </span>
                            </li>
                        @endif
                        @endfor
                    </ul>
                    <p>
                        <b>Question Answer: </b>
                        <span class="float-right">
                            {{ $answer }}
                        </span>
                    </p>
                </div>
                <div class="tab-pane" id="poll_update">
                    @include('poll.edit')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(function () {
            // url
            var is_edit = window.location.href.split('/')[window.location.href.split('/').length-1] == 'edit' ? true : false;
            // active tab
            if(is_edit){
                $('.nav-pills li:nth-child(1) a').removeClass('active');
                $('.tab-content div:nth-child(1)').removeClass('active');
                $('.nav-pills li:nth-child(2) a').addClass('active');
                $('.tab-content div:nth-child(2)').addClass('active');
            }
        });
        $("#team_1").on('change', function() {
            var team_1 = $(this).val();
            console.log(team_1);
            var team_2 = $("#team_2").val();
            if (team_1 == team_2) {
                Toast.fire({
                    icon: 'error',
                    title: 'Team 1 and Team 2 can\'t be same'
                })
                $("#team_1").val('');
            }
        });
        $("#team_2").on('change', function() {
            var team_2 = $(this).val();
            console.log(team_2);
            var team_1 = $("#team_1").val();
            if (team_2 == team_1) {
                Toast.fire({
                    icon: 'error',
                    title: 'Team 1 and Team 2 can\'t be same'
                })
                $("#team_2").val('');
            }
        });
</script>
@endpush
