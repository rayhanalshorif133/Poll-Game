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
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="required">Select Tournament</label>
                                <select name="tournament_id" id="tournament_id" class="form-control">
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
                                <select name="team_1" id="team_1" class="form-control">
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
                                <select name="team_2" id="team_2" class="form-control">
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
                                <input type="date" class="form-control start_date" name="start_date" id="start_date" placeholder="Enter start date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="required">Select End Date</label>
                                <input type="date" class="form-control end_date" name="end_date" id="end_date" placeholder="Enter end date">
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
    });
 </script>
@endpush
