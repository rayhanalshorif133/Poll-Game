@extends('layouts.app')

@section('title')
| Tournaments List
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tournaments</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Tournaments List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tournaments List</h3>
                    <div class="card-tools">
                        <a href="{{ route('tournament.create') }}">
                            <button class="btn btn-sm btn-outline-green" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-plus" aria-hidden="true"></i> New
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered w-100 tournament_datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sport's Name</th>
                                    <th>Icon</th>
                                    <th>Banner</th>
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Description</th>
                                    <th>Remarks</th>
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
@endsection

@push('js')
    <script type="text/javascript">
        $(function() {
            var table = $('.tournament_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tournament.index') }}",
                columns: [{
                        render: function(data, type, row) {
                            return row.DT_RowIndex;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.sports.name;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            let image = `<img src="${row.icon}" alt="${row.name}" width="50" height="50">`;
                            return image;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            let image = `<img src="${row.banner}" alt="${row.name}" width="50" height="50">`;
                            return image;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.name;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            let start_date = new Date(row.start_date);
                            return moment(start_date).format('DD-MMM-YYYY');
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            let end_date = new Date(row.end_date);
                            return moment(end_date).format('DD-MMM-YYYY');
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
                            return row.remarks;
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
                        let status = row.status == 'active' ? `<span class="badge bg-success text-capitalize">${row.status}</span>` : `<span
                            class="badge bg-danger text-capitalize">${row.status}</span>`;
                            return status;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return getButtons("tournament", row.id);
                        },
                        targets: 0,
                    },
                ]
            });
            handleDeleteBtn("tournament");
        });
    </script>
@endpush
