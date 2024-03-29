@extends('layouts.app')

@section('title')
| User List
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
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
                            return getUserButtons("user", row.id,row.auth_user);
                        },
                        targets: 0,
                    },
                ]
            });

            handleDeleteBtn('user');
        });


        getUserButtons = (name, id, auth_user) => {
            let buttons = `
            <div class="btn-group" id=${name}-${id}>
                <a href="${name}/${id}/view" class="btn btn-sm btn-outline-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="${name}/${id}/edit" class="btn btn-sm btn-outline-info"><i class="fa fa-pen" aria-hidden="true"></i></a>
                ${auth_user? "" : '<a href="#" class="btn btn-sm btn-outline-danger deleteBtn"><i class="fa fa-trash" aria-hidden="true"></i></a>'}

            </div>
            `;
            return buttons;
        }
    </script>
@endpush
