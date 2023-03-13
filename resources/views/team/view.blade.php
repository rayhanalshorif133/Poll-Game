@extends('layouts.app')

@section('title')
| Team View
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
    <div class="col-md-8 m-auto">
        <div class="card card-primary card-outline">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-sm" href="#details" data-toggle="tab">team Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm" href="#update" data-toggle="tab">Update</a>
                    </li>
                </ul>
            </div>
            <div class="card-body tab-content">
                <div class="tab-pane active" id="details">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-fluid w-100" src="{{ asset($team->logo) }}" alt="User profile picture">
                            <p class="text-muted text-center">Logo</p>
                        </div>
                        <div class="col-md-6">
                            <img class="img-fluid w-100" src="{{ asset($team->banner) }}" alt="User profile picture">
                            <p class="text-muted text-center">Banner</p>
                        </div>
                    </div>
                    <ul class="list-group list-group-unbordered my-3">
                        <li class="list-group-item">
                            <b>Name</b> <span class="float-right">{{ $team->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Description</b> <br><span class="float-left">{!! $team->description !!}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Status</b>
                            <a class="float-right text-capitalize">
                                @include('layouts.common.status',['status'=>$team->status])
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Created By</b> <span class="float-right">{{ $team->createdBy->name}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Updated By</b> <span class="float-right">{{ $team->updatedBy->name}}</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('team.index') }}" class="btn btn-sm btn-outline-danger"><b><i
                                    class="fa fa-reply-all" aria-hidden="true"></i> Back</b></a>
                    </div>
                </div>
                <div class="tab-pane" id="update">
                    @include('team.edit')
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
</script>
@endpush
