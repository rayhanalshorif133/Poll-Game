@extends('layouts.app')

@section('title')
| Tournament Details
@endsection


@section('head')
<style>
    .default_activated {
        font-size: 12px;
        font-weight: 700;
    }
    .border-3{
        border: 3px solid #dadada40;
        box-shadow: 2px 3px #dadada50;
        padding: 5px;
    }
</style>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tournaments Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('tournament.index')}}">Tournaments</a></li>
                    <li class="breadcrumb-item active">{{$tournament->name}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card card-primary card-outline">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-sm" href="#details" data-toggle="tab">Tournament Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm" href="#update" data-toggle="tab">Update</a>
                    </li>
                </ul>
            </div>
            <div class="card-body tab-content">
                <div class="tab-pane active" id="details">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="text-center">
                                <img class="img-fluid w-50 border-3" src="{{ asset($tournament->icon) }}" alt="Icon">
                                <br>
                                <b>Tournament Icon</b>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">
                                <img class="img-fluid w-50 border-3" src="{{ asset($tournament->banner) }}" alt="Banner">
                                <br>
                                <b>Tournament Banner</b>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <ul class="list-group justify-content-center my-3 m-auto">
                                <li class="list-group-item">
                                    <b>Tournament's Name</b> <span class="float-right">{{ $tournament->name }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Sport's Name</b> <span class="float-right">{{ $tournament->sports->name }}</span>
                                </li>
                                {{-- start_date --}}
                                <li class="list-group-item">
                                    @php
                                    $start_date = date('d-M-Y', strtotime($tournament->start_date));
                                    @endphp
                                    <b>Start Date</b> <span class="float-right getStartDate">{{ $start_date }}</span>
                                </li>
                                {{-- end_date --}}
                                <li class="list-group-item">
                                    @php
                                    $end_date = date('d-M-Y', strtotime($tournament->end_date));
                                    @endphp
                                    <b>End Date</b> <span class="float-right getEndDate">{{ $end_date }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b>
                                    <a class="float-right text-capitalize">
                                        @include('layouts.common.status',['status'=>$tournament->status])
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Created By</b> <span class="float-right">{{ $tournament->createdBy->name}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Updated By</b> <span class="float-right">{{ $tournament->updatedBy->name}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group justify-content-center my-3 m-auto">
                                <li class="list-group-item">
                                    <b>Description
                                        <hr>
                                    </b> <br>
                                    <span class="float-left">{!! $tournament->description !!}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Remarks
                                        <hr>
                                    </b> <br>
                                    <span class="float-left">{!! $tournament->remarks !!}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tournament.index') }}" class="btn btn-sm btn-outline-danger"><b><i
                                    class="fa fa-reply-all" aria-hidden="true"></i> Back</b></a>
                    </div>
                </div>
                <div class="tab-pane" id="update">
                    <form action="{{route('tournament.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$tournament->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="required">Select Sport's Name</label>
                                    <select name="sport_id" id="sport_id" class="form-control">
                                        @foreach($sports as $sport)
                                        @if ($sport->id == $tournament->sport_id)
                                            <option value="{{$sport->id}}" selected>{{$sport->name}}</option>
                                        @else
                                        <option value="{{$sport->id}}">{{$sport->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="required">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{$tournament->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="icon" class="required">Icon</label>
                                    <input type="file" class="form-control" name="icon" id="icon" placeholder="Upload icon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="banner" class="required">Banner</label>
                                    <input type="file" class="form-control" name="banner" id="banner" placeholder="Upload banner image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date" class="required">Start Date</label>
                                    @php
                                    $start_date = date('Y-m-d', strtotime($tournament->start_date));
                                    @endphp
                                    <input type="date" class="form-control" name="update_start_date" value="{{$start_date}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date" class="required">End Date</label>
                                    @php
                                    $end_date = date('Y-m-d', strtotime($tournament->end_date));
                                    @endphp
                                    <input type="date" class="form-control" name="update_end_date" value="{{$end_date}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description" class="optional">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{!! $tournament->description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="remarks" class="optional">Remarks</label>
                                    <textarea name="remarks" id="remarks" class="form-control" cols="30" rows="10">{!! $tournament->remarks !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="icon">Status</label> <span>(<span class="text-danger default_activated">Default
                                            Activated***</span>)</span> <br />
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
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-sm btn-outline-green"><b>Submit</b></button>
                            <a href="{{ route('tournament.index') }}" class="btn btn-sm btn-outline-danger"><b>
                                    <i class="fa fa-reply-all" aria-hidden="true"></i> Back</b></a>
                        </div>
                    </form>
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
            $('#description').summernote({
                height: 200,
                tabsize: 2
            });
            $('#remarks').summernote({
                height: 200,
                tabsize: 2
            });
        });
</script>
@endpush
