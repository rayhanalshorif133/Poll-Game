@extends('layouts.app')

@section('head')
    <style>

    </style>
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create New User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
                    <li class="breadcrumb-item active">Add New User</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <div class="container">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create a new user</h3>
                    <div class="card-tools">
                        <a href="{{ route('user.index') }}">
                            <button class="btn btn-sm btn-outline-white" data-toggle="tooltip" data-placement="top">
                                <b><i class="fa fa-reply-all" aria-hidden="true"></i> Back</b>
                            </button>
                        </a>
                    </div>
                </div>
                <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="required">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="required">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="required">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="required">Confirmation Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="role">Select User Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" selected disabled>Select Role</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
