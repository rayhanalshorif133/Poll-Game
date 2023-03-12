@extends('layouts.app')

@section('head')
    <style>

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-6 m-auto">
            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    User Details
                </div>
                <div class="card-body">
                    <h3 class="profile-username text-center text-capitalize">{{ $user->name }}</h3>
                    <p class="text-muted text-center">
                        <span class="right badge badge-danger">
                            @if ($user->roles->count() > 0)
                                {{ $user->roles[0]->name }}
                            @else
                                Not Set
                            @endif
                        </span>
                    </p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Gmail</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-danger"><b><i
                                    class="fa fa-reply-all" aria-hidden="true"></i> Back</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
