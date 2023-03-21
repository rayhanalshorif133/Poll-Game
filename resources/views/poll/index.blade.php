@extends('layouts.app')

@section('title')
| Poll
@endsection

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-md-2 text-left">
                    <h3 class="card-title">Poll List</h3>
                </div>
                <div class="col-md-4 d-flex text-center">
                    <select name="match_id" id="match_id" class="form-control w-100">
                        <option value="" selected disabled>Select Match</option>
                        @foreach ($matches as $match)
                        <option value="{{ $match->id }}" data-timeDiff="{{$match->timeDiff($match->id)}}">{{ $match->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex text-center">
                    <select name="match_day" id="match_day" class="form-control w-100">
                        <option value="" selected disabled>Select Day</option>
                    </select>
                </div>
                <div class="col-md-2 text-right">
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
                                <th>Day</th>
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
