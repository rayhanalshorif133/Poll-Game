@extends('layouts.app')

@section('head')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Poll List</h3>
                <div class="card-tools">
                    <a href="{{ route('poll.create') }}">
                        <button class="btn btn-sm btn-outline-green" data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-plus" aria-hidden="true"></i> New
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered user_datatable w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush
