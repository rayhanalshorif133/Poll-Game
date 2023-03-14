@extends('layouts.app')

@section('title')
| Add New Poll
@endsection


@section('head')
<style>
    .default_activated {
        font-size: 12px;
        font-weight: 700;
    }

    .card-mahogany:not(.card-outline)>.card-header {
        background-color: #420C08;
        color: #fff;
    }

    .btn-mahogany {
        color: #fff;
        background-color: #420C08;
        border-color: #420C08;
        box-shadow: none;
    }

    .btn-mahogany:hover {
        color: #fff;
        background-color: #310704;
        border-color: #310704;
    }
    .btn-outline-mahogany{
        color: #420C08;
        background-color: transparent;
        background-image: none;
        border-color: #420C08;
    }
    .btn-outline-mahogany:hover{
        color: #fff;
        background-color: #420C08;
        border-color: #420C08;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="col-md-12 m-auto align-self-center">
        <div class="card card-mahogany">
            <div class="card-header">
                <h3 class="card-title">Create a new poll</h3>
                <div class="card-tools">
                    <a href="{{ route('poll.index') }}">
                        <button class="btn btn-sm btn-outline-white" data-toggle="tooltip" data-placement="top">
                            <b><i class="fa fa-reply-all" aria-hidden="true"></i> Back</b>
                        </button>
                    </a>
                </div>
            </div>
            <form action="{{route('poll.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="required">Choise the Match</label>
                        <select class="form-control" name="match_id" id="match_id">
                            <option value="" selected disabled>Select Match</option>
                            @foreach($matches as $match)
                            <option value="{{$match->id}}">{{$match->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question" class="required">Question?</label>
                        <input type="text" class="form-control" name="question" id="question" placeholder="Enter your question">
                    </div>
                    <div class="form-group">
                        <label for="question_images" class="optional">Question Image</label>
                        <div class="row">
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="question_images[]">
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-sm btn-outline-mahogany"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="required">Choise option's type</label>
                        <select class="form-control" name="option_type" id="option_type">
                            @foreach($optionTypes as $key => $type)
                            @if($key == 0)
                            <option value="{{$key}}" selected>{{$type}}</option>
                            @else
                            <option value="{{$key}}">{{$type}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <span id="append_option">
                        @for ($index = 1; $index <= 2; $index++)
                        <div class="form-group">
                            <label for="option{{$index}}" class="required">Option {{$index}}</label>
                            <input type="${type}" class="form-control" name="option{{$index}}" id="option{{$index}}"
                                placeholder="Enter your option">
                        </div>
                        @endfor
                    </span>


                <div class="card-footer">
                    <button type="submit" class="btn btn-mahogany">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(function(){
        optionTypeHandler();
    });

    optionTypeHandler = () => {
        $("#option_type").change(function(){
            let type = $(this).val();
            type = parseInt($(this).val());
            $("#append_option").html('');
            type == 1 ? type = 'file' : type = 'text';
            let image = '';
            for (let index = 1; index <= 2; index++) {
                image += `
                <div class="form-group">
                    <label for="option${index}" class="required">Option ${index}</label>
                    <input type="${type}" class="form-control" name="option${index}" id="option${index}" placeholder="Enter your option">
                </div>`;
            }
            $("#append_option").append(image);
        });
    }


</script>
@endpush
