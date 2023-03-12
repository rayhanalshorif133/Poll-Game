@extends('layouts.app')

@section('head')
<style>
    .default_activated{
        font-size: 12px;
        font-weight: 700;
    }
    .card-purple:not(.card-outline)>.card-header {
        background-color: #3e1492;
    }
    .btn-purple {
        color: #fff;
        background-color: #3e1492;
        border-color: #3e1492;
        box-shadow: none;
    }
    .btn-purple:hover {
        color: #fff;
        background-color: #4a2691;
        border-color: #4a2691;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card card-purple">
            <div class="card-header">
                <h3 class="card-title">Create a new sports</h3>
                <div class="card-tools">
                    <a href="{{ route('sports.index') }}">
                        <button class="btn btn-sm btn-outline-white" data-toggle="tooltip" data-placement="top">
                            <b><i class="fa fa-reply-all" aria-hidden="true"></i> Back</b>
                        </button>
                    </a>
                </div>
            </div>
            <form action="{{route('sports.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="icon" class="required">Icon</label>
                        <input type="file" class="form-control" name="icon" id="icon" placeholder="Enter name">
                    </div>
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

                <div class="card-footer">
                    <button type="submit" class="btn btn-purple">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush
