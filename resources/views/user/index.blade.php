@extends('layouts.app')

@section('title')
| User List
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User List</h3>
                    <div class="card-tools">
                        <a href="{{ route('user.create') }}">
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
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
            var table = $('.user_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.index') }}",
                columns: [{
                        render: function(data, type, row) {
                            return row.DT_RowIndex;
                        },
                        targets: 0,
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        render: function(data, type, row) {
                            let role = "Not Set";
                            if (row.roles[0]) {
                                role = row.roles[0].name;
                            }
                            return role;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return getBtns(data, type, row);
                        },
                        targets: 0,
                    },
                ]
            });
        });


        function getBtns(data, type, row) {
            let btns = `
            <div class="btn-group">
                <a href="user/${row.id}/view" class="btn btn-sm btn-outline-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="user/${row.id}/edit" class="btn btn-sm btn-outline-info"><i class="fa fa-pen" aria-hidden="true"></i></a>
                <a href="#" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>
        `;
            return btns;
        }
    </script>
@endpush
