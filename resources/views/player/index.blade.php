@extends('layouts.app')

@section('title')
| Players
@endsection

@section('content')
<div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-md-2 text-left">
                    <h3 class="card-title">Players List</h3>
                </div>
                <div class="col-md-8 text-center d-flex">
                    <label for="search" class="mt-2 w-25">Start Date</label>
                    <input type="date" class="form-control w-25" id="start_date">
                    <label for="search" class="mt-2 w-25">End Date</label>
                    <input type="date" class="form-control w-25" id="end_date">
                    <select class="ml-2 w-25 form-control" id="operator">
                        <option value="" selected disabled>Select a Operator</option>
                        @foreach ($operators as $operator)
                            <option value="{{$operator}}">{{$operator}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 text-center d-flex">
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
                                <th>Operator</th>
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
@include('player.edit')
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
            let operator = $("#operator").val();
            // get table data

            if(!start_date && !end_date && !operator){
                Toast.fire({
                icon: 'error',
                title: 'Please select atleast one searchable item...!!!'
                });
                return false;
            }

            let url = `/player/${start_date}/${end_date}/`;
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
                        return row.operator;
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
                        let action = `<span class="btn btn-sm btn-outline-green editBtn" id="${row.id}" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </span>`;
                        return action;
                    },
                    targets: 0,
                },
            ]
        });
        handleDeleteBtn("poll/admin");
        handleEditBtn();
    }

    handleEditBtn = () => {
        $(document).on('click', '.editBtn', function() {
            let id = $(this).attr('id');
            $('#player-edit-modal').modal('show');
        });
        $(document).on('click', '.close-modal', function() {
            $('#player-edit-modal').modal('hide');
        });
    }

</script>
@endpush
