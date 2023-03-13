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
                    <h3 class="card-title">Match List</h3>
                    <div class="card-tools">
                        <a href="{{ route('match.create') }}">
                            <button class="btn btn-sm btn-outline-green" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-plus" aria-hidden="true"></i> New
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered match_datatable w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Torunament <br> Name</th>
                                    <th>Team vs Team</th>
                                    <th>Match Date Time</th>
                                    <th>Description</th>
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
    <script type="text/javascript">
        $(function() {
            var table = $('.match_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('match.index') }}",
                columns: [{
                        render: function(data, type, row) {
                            return row.DT_RowIndex;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.title;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.tournament.name;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.team1.name + ` <span class="text-bold">vs</span> ` + row.team2.name;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            let start_date_time = moment(row.start_date_time).format('DD-MMM-YYYY hh:mm A');
                            let end_date_time = moment(row.end_date_time).format('DD-MMM-YYYY hh:mm A');
                            return start_date_time + ` <span class="text-bold">to <br></span> ` + end_date_time;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.description;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.status == "active" ? `<span class="badge badge-success">Active</span>` : `<span class="badge badge-danger">Inactive</span>`;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.created_by.name;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.updated_by.name;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return getButtons("match", row.id);
                        },
                        targets: 0,
                    },
                ]
            });
            handleDeleteBtn("match");
        });
    </script>
@endpush
