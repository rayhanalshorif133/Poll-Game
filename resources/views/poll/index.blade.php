@extends('layouts.app')

@section('title')
| Poll
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
                    <table class="table table-bordered poll_datatable w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Match</th>
                                <th>Question?</th>
                                <th>Answer</th>
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
</div>
@endsection

@push('js')
<script type="text/javascript">
    $(function() {
            var table = $('.poll_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('poll.index') }}",
                columns: [{
                        render: function(data, type, row) {
                            return row.DT_RowIndex;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.match.title;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            return row.question;
                        },
                        targets: 0,
                    },
                    {
                        render: function(data, type, row) {
                            if(row.option_type == "text")
                            {
                                if(row.answer == 'option_1'){
                                    return row.option_1;
                                }else if(row.answer == 'option_2'){
                                    return row.option_2;
                                }else if(row.answer == 'option_3')
                                {
                                    return row.option_3;
                                }else if(row.answer == 'option_4')
                                {
                                    return row.option_4;
                                }
                                else{
                                    return 'Not Set';
                                }
                            }else{
                                if(row.answer == 'option_1'){
                                    return '<img src="'+row.option_1+'" width="50px" height="50px">';
                                }else if(row.answer == 'option_2'){
                                    return '<img src="'+row.option_2+'" width="50px" height="50px">';
                                }else if(row.answer == 'option_3')
                                {
                                    return '<img src="'+row.option_3+'" width="50px" height="50px">';
                                }else if(row.answer == 'option_4')
                                {
                                    return '<img src="'+row.option_4+'" width="50px" height="50px">';
                                }
                                else{
                                    return 'Not Set';
                                }
                            }
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
                            return getButtons("poll", row.id);
                        },
                        targets: 0,
                    },
                ]
            });
            handleDeleteBtn("match");
        });
</script>
@endpush
