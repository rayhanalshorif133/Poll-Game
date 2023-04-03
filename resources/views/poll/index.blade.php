@extends('layouts.app')

@section('title')
| Poll
@endsection

@section('content')
<div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-md-1 text-left">
                    <h3 class="card-title">Poll List</h3>
                </div>
                <div class="col-md-3 d-flex text-center">
                    <select name="match_id" id="match_id" class="form-control w-100">
                        <option value="" selected disabled>Select Match</option>
                        @foreach ($matches as $match)
                        <option value="{{ $match->id }}" data-timeDiff="{{$match->timeDiff($match->id)}}">{{ $match->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex text-center">
                    <select name="match_day" id="match_day" class="form-control w-100">
                        <option value="" selected disabled>Select Day</option>
                    </select>
                </div>
                <div class="col-md-1 text-center">
                    <a href="{{route('poll.index')}}" class="btn btn-sm btn-outline-green">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group">
                        <a href="{{ route('poll.create') }}">
                            <button type="button" class="btn btn-outline-green btn-sm m-1"><i class="fa fa-plus" aria-hidden="true"></i> New </button>
                        </a>
                        <div class="btn-group actions d-none">
                            <button type="button" class="btn btn-outline-mahogany btn-sm m-1 dropdown-toggle dropdown-icon" data-toggle="dropdown"
                                aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item activeBtn" href="#">
                                    <i class="fa fa-check" aria-hidden="true"></i> Active
                                </a>
                                <a class="dropdown-item inactiveBtn" href="#">
                                    <i class="fa fa-times" aria-hidden="true"></i> Inactive
                                </a>
                                <a class="dropdown-item multiDeleteBtn" href="#">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered poll_datatable w-100">
                        <thead>
                            <tr>
                                <th>
                                    <div class="icheck-info d-inline">
                                        <input type="checkbox" id="checkboxAll">
                                        <label for="checkboxAll"></label>
                                    </div>
                                </th>
                                <th>#</th>
                                <th>Match</th>
                                <th>Day</th>
                                <th>Question?</th>
                                <th>Answer</th>
                                <th>Status</th>
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
@endsection

@push('js')
{{-- btns --}}

<script type="text/javascript">
    var table = "";
    var ids = [];
    $(function() {
        handleDataTable();
        handleSelectedMatch();
        checkActionBtn();
        actionBtns();
    });

    actionBtns = () => {
        $(document).on('click', '.activeBtn', function(e) {
            e.preventDefault();
            if(ids.length == 0){
                Toast.fire({
                    icon: 'error',
                    title: 'Please select at least one item'
                })
            }
            sendActionBackend('active');
        });
        $(document).on('click', '.inactiveBtn', function(e) {
            e.preventDefault();
            if(ids.length == 0){
                Toast.fire({
                    icon: 'error',
                    title: 'Please select at least one item'
                })
            }
            sendActionBackend('inactive');
        });
        $(document).on('click', '.multiDeleteBtn', function(e) {
            e.preventDefault();
            if(ids.length == 0){
                Toast.fire({
                    icon: 'error',
                    title: 'Please select at least one item'
                })
            }
            sendActionBackend('delete');
        });

    }


    sendActionBackend = (action) => {
        axios.post('/poll/actions', {
            pollIds: ids,
            action: action
        }).then(function(response) {
            table.ajax.reload();
            ids = [];
            checkActionBtn();
        });
    };

     checkActionBtn = () => {
        if(ids.length > 0){
            $('.actions').removeClass('d-none');
        } else {
            $('.actions').addClass('d-none');
        }
        return true;
     }


    handleSelectedMatch = () => {
        $(document).on('change', '#match_id', function() {
            let match_id = $(this).val();
            let timeDiff = $(this).find(':selected').data('timediff');
            $('#match_day').empty();
            $('#match_day').append(`<option value="" selected disabled>Select Day</option>`);
            for (let day = 1; day <= timeDiff; day++) {
                $('#match_day').append(`<option value="${day}">Day-${day}</option>`);
            }
            table.destroy();
            handleDataTable(match_id);
        });

        $(document).on('change', '#match_day', function() {
            let match_id = $('#match_id').val();
            let day = $(this).val();
            table.destroy();
            handleDataTable(match_id, day);
        });
    }

    handleDataTable = (match_id = null, day = null) =>{
        let url = match_id? `/admin/poll/${match_id}/` : "/admin/poll/";
        url = day? `${url}${day}` : url;
        table = $('.poll_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            buttons: [
                {
                    text: 'Select all',
                    action: function () {
                        table.rows().select();
                    }
                },
                {
                    text: 'Select none',
                    action: function () {
                        table.rows().deselect();
                    }
                }
            ],
            columns: [{
                    render: function(data, type, row) {
                        let checkItem = '';
                        if(ids.includes(row.id)){
                            checkItem = `
                            <div class="icheck-info d-inline">
                                <input type="checkbox" id="checkboxInfo-${row.id}" class="checkBoxItem selected" checked="">
                                <label for="checkboxInfo-${row.id}"></label>
                            </div>
                            `;
                        } else {
                            checkItem = `
                            <div class="icheck-info d-inline">
                                <input type="checkbox" id="checkboxInfo-${row.id}" class="checkBoxItem">
                                <label for="checkboxInfo-${row.id}"></label>
                            </div>
                            `;
                        }
                        checkActionBtn();
                        return checkItem;
                    },
                    orderable: false,
                    targets: 0,
                },
                {
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
                        let status = row.status == 'active'? `<span class="badge badge-success">Active</span>` : `<span class="badge badge-danger">Inactive</span>`;
                        return status;
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

        // short false in 1st column
        handleDeleteBtn("poll/admin");

        // handle check all
        $(document).on('change', '#checkboxAll', function() {
            if ($(this).is(':checked')) {
                $(this).addClass('selected');
                $('.poll_datatable tbody tr').addClass('selected');
                $('.poll_datatable tbody tr').find('input[type="checkbox"]').prop('checked', true);
                axios.get(`/fetch-poll`)
                    .then(function(response) {
                        let data = response.data.data;
                        data.forEach(element => {
                            ids.push(element.id);
                        });
                        ids = [...new Set(ids)];
                        checkActionBtn();
                    });

            } else {
                $(this).removeClass('selected');
                $('.poll_datatable tbody tr').removeClass('selected');
                $('.poll_datatable tbody tr').find('input[type="checkbox"]').prop('checked', false);
                ids = [];
            }
            checkActionBtn();
        });

        // handle check item
        $(document).on('change', '.checkBoxItem', function() {
            var singleID = $(this).attr('id').split('-')[1];
            singleID = parseInt(singleID);
            if ($(this).is(':checked')) {
                $(this).closest('tr').addClass('selected');
                ids.push(singleID);
            } else {
                if($("#checkboxAll").hasClass('selected')){
                    $("#checkboxAll").prop('checked', false);
                    $("#checkboxAll").removeClass('selected');
                }
                $(this).closest('tr').removeClass('selected');
                ids = ids.filter(function(value, index, arr){
                    return value != singleID;
                });
            }
            checkActionBtn();
        });
    }

</script>
@endpush
