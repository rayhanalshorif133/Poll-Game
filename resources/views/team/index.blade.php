@extends('layouts.app')

@section('title')
| Teams List
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Teams List</h3>
                    <div class="card-tools">
                        <a href="{{ route('team.create') }}">
                            <button class="btn btn-sm btn-outline-green" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-plus" aria-hidden="true"></i> New
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered team_datatable w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Banner</th>
                                    <th>Name</th>
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
            var table = $('.team_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('team.index') }}",
                columns: [{
                        render: function(data, type, row) {
                            return row.DT_RowIndex;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            let image = `<img src="${row.logo}" alt="${row.name}" width="50" height="50">`;
                            return image;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            if(row.banner == null) {
                                return 'No Banner';
                            }else{
                                let image = `<img src="${row.banner}" alt="${row.name}" width="50" height="50">`;
                                return image;
                            }
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
                            return row.description;
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
                            return row.status;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return getButtons("team", row.id);
                        },
                        targets: 0,
                    },
                ]
            });
            handleDeleteBtn("team");
        });
    </script>
@endpush
