@extends('layouts.app')

@section('title')
| Participate
@endsection

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-md-2 text-left">
                    <h3 class="card-title">Participate List</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered participate_datatable w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Match</th>
                                <th>Tournament Name</th>
                                <th>Match Duration</th>
                                <th>Total Participate</th>
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
    });



    handleDataTable = () =>{
        table = $('.participate_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('participate.index') }}",
            columns: [{
                    render: function(data, type, row) {
                        return row.DT_RowIndex;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        let title = `<a href="/match/${row.match.id}/view">${row.match.title}</a>`;
                        return title;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        let name = `<a href="/tournament/${row.match.tournament_id}/view">${row.tournament}</a>`;
                        return name;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        return row.match_duration + " Days";
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        return row.subscription;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        let action = `<a href="/participate/${row.match.id}/view" class="btn btn-sm btn-outline-green" data-toggle="tooltip" data-placement="top" title="View">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
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
