@extends('layouts.app')

@section('title')
| Subcription
@endsection

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-md-2 text-left">
                    <h3 class="card-title">Subcription List</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered poll_datatable w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tournament Name</th>
                                <th>Match</th>
                                <th>Count Of Subscription</th>
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
        // handleDataTable();
        handleSelectedMatch();
    });


    handleSelectedMatch = () => {
        $(document).on('change', '#match_id', function() {
            let match_id = $(this).val();
            let timeDiff = $(this).find(':selected').data('timediff');
            $('#match_day').empty();
            $('#match_day').append(`<option value="" selected disabled>Select Day</option>`);
            for (let day = 1; day <= timeDiff; day++) {
                $('#match_day').append(`<option value="${day}">Day-${day}</option>`);
            }
            // table.destroy();
            // handleDataTable(match_id);
        });

        $(document).on('change', '#match_day', function() {
            console.log($(this).val());
            let match_id = $('#match_id').val();
            let day = $(this).val();
            table.destroy();
            // handleDataTable(match_id, day);
        });
    }

    handleDataTable = (match_id = null, day = null) =>{
        let url = match_id? `/admin/poll/${match_id}/` : "/admin/poll/";
        url = day? `${url}${day}` : url;
        table = $('.poll_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
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
                        return "Day-" + row.day;
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
                            for (let index = 1; index <= 4; index++) {
                                let isAnswerOption = row.answer == 'option_'+index ? true : false;
                                let option = index == 1 ? row.option_1 : index == 2 ? row.option_2 : index == 3 ? row.option_3 : row.option_4;
                                if(isAnswerOption){
                                    let image = `
                                    <a class="example-image-link" href="${option}" data-lightbox="example-set"
                                        data-title="Click the right half of the image to move forward.">
                                        <img class="example-image p-2 bd-3" height="75"
                                            width="75" src="${option}" alt="" />
                                    </a>
                                    `;
                                    return image;
                                }
                                else{
                                    return 'Not Set';
                                }
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
                        return getButtons("/poll/admin", row.id);
                    },
                    targets: 0,
                },
            ]
        });
        handleDeleteBtn("poll/admin");
    }

</script>
@endpush
