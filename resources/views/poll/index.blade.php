@extends('layouts.app')

@section('title')
| Poll
@endsection

@section('content')
<div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-md-1 text-left">
                    <h3 class="card-title">Poll List</h3>
                </div>
                <div class="col-md-3 d-flex text-center">
                    <select name="match_id" id="match_id" class="form-control w-100">
                        <option value="" selected disabled>Select Match</option>
                        @foreach ($matches as $match)
                        <option value="{{ $match->id }}" data-timeDiff="{{$match->timeDiff($match->id)}}">{{ $match->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex text-center">
                    <select name="match_day" id="match_day" class="form-control w-75 mx-2 d-none">
                        <option value="" selected disabled>Select Day</option>
                    </select>
                    <select name="poll_status" id="poll_status" class="form-control w-75 mx-2">
                        <option value="" selected disabled>Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-md-1 text-center">
                    <span class="btn btn-sm btn-outline-green" id="refresh_poll">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group">
                        <a href="{{ route('poll.create') }}">
                            <button type="button" class="btn btn-outline-green btn-sm m-1"><i class="fa fa-plus" aria-hidden="true"></i> New </button>
                        </a>
                        <div class="btn-group actions d-none">
                            <button type="button" class="btn btn-outline-mahogany btn-sm m-1 dropdown-toggle dropdown-icon" data-toggle="dropdown"
                                aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item activeBtn" href="#">
                                    <i class="fa fa-check" aria-hidden="true"></i> Active
                                </a>
                                <a class="dropdown-item inactiveBtn" href="#">
                                    <i class="fa fa-times" aria-hidden="true"></i> Inactive
                                </a>
                                <a class="dropdown-item multiDeleteBtn" href="#">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered poll_datatable w-100">
                        <thead>
                            <tr>
                                <th>
                                    <div class="icheck-info d-inline">
                                        <input type="checkbox" id="checkboxAll">
                                        <label for="checkboxAll"></label>
                                    </div>
                                </th>
                                <th>#</th>
                                <th>Match</th>
                                <th>Day</th>
                                <th>Question?</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection

@push('js')
<script type="text/javascript" src="{{asset('js/admin/poll/index.js')}}"></script>
@endpush
