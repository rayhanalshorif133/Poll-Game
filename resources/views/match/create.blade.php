@extends('layouts.app')

@section('head')
<style>
    .default_activated{
        font-size: 12px;
        font-weight: 700;
    }
    .card-army:not(.card-outline)>.card-header {
        background-color: #4A521F;
        color: #fff;
    }
</style>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add New Match</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Match</a></li>
                    <li class="breadcrumb-item active">Add New Match</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container">
    <div class="col-md-12">
        <div class="card card-army">
            <div class="card-header">
                <h3 class="card-title">Create a new match</h3>
                <div class="card-tools">
                    <a href="{{ route('match.index') }}">
                        <button class="btn btn-sm btn-outline-white" data-toggle="tooltip" data-placement="top">
                            <b><i class="fa fa-reply-all" aria-hidden="true"></i> Back</b>
                        </button>
                    </a>
                </div>
            </div>
            <form action="{{route('match.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="required">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="required">Select Tournament</label>
                                <select name="tournament_id" id="tournament_id" class="form-control" required>
                                    <option value="">Select Tournament</option>
                                    @foreach($tournaments as $tournament)
                                    <option value="{{$tournament->id}}">{{$tournament->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="required">Select Team 1</label>
                                <select name="team_1" id="team_1" class="form-control" required>
                                    <option value="" selected disabled>Select Team 1</option>
                                    @foreach($teams as $team)
                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="required">Select Team 2</label>
                                <select name="team_2" id="team_2" class="form-control" required>
                                    <option value="" selected disabled>Select Team 2</option>
                                    @foreach($teams as $team)
                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- start date and end date --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="required">Select Start Date</label>
                                @php
                                    $start_only_date = date('Y-m-d');
                                    $start_only_time = date('H:i');
                                @endphp
                                <div class="d-flex date_time">
                                    <input type="date" class="form-control" name="start_date" id="start_date" value="{{$start_only_date}}" min="{{$start_only_date}}" required>
                                    <input type="time" class="form-control" name="start_time" value="{{$start_only_time}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="required">Select End Date</label>
                                @php
                                    $end_only_date = date('Y-m-d');
                                    $end_only_time = date('H:i');
                                @endphp
                                <div class="d-flex date_time">
                                    <input type="date" class="form-control" name="end_date" id="end_date" value="{{$end_only_date}}" required>
                                    <input type="time" class="form-control" name="end_time" value="{{$end_only_time}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="icon">Status</label> <span>(<span class="text-danger default_activated">Default Activated***</span>)</span> <br />
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-success btn-sm active">
                                        <input type="radio" name="status" autocomplete="off" checked="" value="active"> Active
                                    </label>
                                    <label class="btn btn-outline-danger btn-sm">
                                        <input type="radio" name="status" autocomplete="off" value="inactive"> Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-army">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
 <script>
    $(function() {
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

        $("#start_date").on('change', function() {
            var start_date = $(this).val();
            $("#end_date").val(start_date);
            var end_date = $("#end_date").val();
            $("#end_date").attr('min', start_date);
        });
    });
 </script>
@endpush
