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
</style>
@endsection

@section('content')
<div class="container">
    <div class="col-md-12 m-auto">
        <div class="card card-primary card-outline">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-sm" href="#details" data-toggle="tab">Metch Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm" href="#update" data-toggle="tab">Update</a>
                    </li>
                </ul>
            </div>
            <div class="card-body tab-content">
                <div class="tab-pane active" id="details">
                    ok
                </div>
                <div class="tab-pane" id="update">
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
