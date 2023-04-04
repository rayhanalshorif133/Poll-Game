@extends('layouts.app')

@section('title')
| Players
@endsection

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-md-2 text-left">
                    <h3 class="card-title">Players List</h3>
                </div>
                <div class="col-md-6 text-center d-flex">
                    <label for="search" class="mt-2 w-25">Start Date</label>
                    <input type="date" class="form-control w-25" id="start_date">
                    <label for="search" class="mt-2 w-25">End Date</label>
                    <input type="date" class="form-control w-25" id="end_date">
                </div>
                <div class="col-md-4 text-center d-flex">
                    <button class="btn btn-outline-info btn-sm" id="search_btn" style="margin: 5px;">
                        <i class="fa fa-search"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" id="refresh_btn" style="margin: 5px;">
                        <i class="fa fa-refresh"></i>
                    </button>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered player_datatable w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avater</th>
                                <th>Phone</th>
                                <th>Joining At</th>
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
    var table = "";
    $(function() {
        handleDataTable();
        handleSearchBtn();
        handleRefreshBtn();
    });

    handleSearchBtn = () =>{
        $('#search_btn').on('click', function() {
            let start_date = $('#start_date').val();
            // get end date
            let end_date = $('#end_date').val();
            // get table data
            let url = `/player/${start_date}/${end_date}`;
            table.ajax.url(url).load();
        });
    };

    handleRefreshBtn = () =>{
        $('#refresh_btn').on('click', function() {
            $('#start_date').val('');
            $('#end_date').val('');
            table.ajax.url( "{{ route('player.index') }}").load();
        });
    };


    handleDataTable = () =>{
        table = $('.player_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('player.index') }}",
            columns: [{
                    render: function(data, type, row) {
                        return row.DT_RowIndex;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        return `<img src="${row.avatar}" alt="avater" class="img-fluid" style="width: 50px; height: 50px;">`;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        return row.phone;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        let joining = moment(row.created_at).format('DD-MMMM-YYYY hh:mm:ss a');
                        return joining;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        let action = `<a href="/player/${row.id}/edit" class="btn btn-sm btn-outline-green" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>`;
                        return action;
                    },
                    targets: 0,
                },
            ]
        });
        handleDeleteBtn("poll/admin");
    }

</script>
@endpush
