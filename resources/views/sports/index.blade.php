@extends('layouts.app')


@section('title')
| Sports List
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sports List</h3>
                    <div class="card-tools">
                        <a href="{{ route('sports.create') }}">
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
                                    <th>Icon</th>
                                    <th>Name</th>
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
            var table = $('.user_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('sports.index') }}",
                columns: [{
                        render: function(data, type, row) {
                            return row.DT_RowIndex;
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
                            return row.name;
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
                            let status = row.status == 'active' ? `<span class="badge bg-success text-capitalize">${row.status}</span>` : `<span class="badge bg-danger text-capitalize">${row.status}</span>`;
                            return status;
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
            handleDeleteBtn();
        });


        function getBtns(data, type, row) {
            let btns = `
            <div class="btn-group" id=sports-${row.id}>
                <a href="sports/${row.id}/view" class="btn btn-sm btn-outline-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="sports/${row.id}/edit" class="btn btn-sm btn-outline-info"><i class="fa fa-pen" aria-hidden="true"></i></a>
                <a href="#" class="btn btn-sm btn-outline-danger deleteBtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
                `;
                return btns;
            }

        function handleDeleteBtn(){
            $(document).on("click",".deleteBtn",function(event){
                var removeRow = $(this).closest('tr');
                var id = $(this).closest('div').attr('id').split('-')[1];
                var url = "/sports/"+id+"/delete";
                deleteItem(url,removeRow);
            });
        }
    </script>
@endpush
