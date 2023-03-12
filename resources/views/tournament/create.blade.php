@extends('layouts.app')

@section('head')
<style>
    .default_activated{
        font-size: 12px;
        font-weight: 700;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="col-md-12 pb-3">
        <div class="card card-green">
            <div class="card-header">
                <h3 class="card-title">Create a new Tournament</h3>
                <div class="card-tools">
                    <a href="{{ route('tournament.index') }}">
                        <button class="btn btn-sm btn-outline-white" data-toggle="tooltip" data-placement="top">
                            <b><i class="fa fa-reply-all" aria-hidden="true"></i> Back</b>
                        </button>
                    </a>
                </div>
            </div>
            <form action="{{route('tournament.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="required">Select Sport's Name</label>
                                <select name="sport_id" id="sport_id" class="form-control">
                                    <option value="" disabled selected>Select Sport's Name</option>
                                    @foreach($sports as $sport)
                                    <option value="{{$sport->id}}">{{$sport->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="required">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
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
                                <input type="date" class="form-control" name="start_date" id="start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date" class="required">End Date</label>
                                <input type="date" class="form-control" name="end_date" id="end_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="optional">Description</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="remarks" class="optional">Remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control" cols="30" rows="10"></textarea>
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
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-green">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
 <script>
    $(function(){
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
