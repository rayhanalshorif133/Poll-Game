@extends('layouts.app')

@section('title')
| Poll View
@endsection
@section('head')
<style>
    .default_activated {
        font-size: 12px;
        font-weight: 700;
    }

    .w-35 {
        width: 35%;
    }
    .bd-3{
        border: 1px solid #ccc;
        padding: 5px;
    }

</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    Match Details
                </div>
                <div class="card-body">
                    <p>
                        <b>Match Title: </b>
                        <span class="float-right">
                            <a href="{{ route('match.view',$poll->match->id) }}">
                                {{ $poll->match->title }}
                            </a>
                        </span>
                    </p>
                    <ul class="list-group list-group-unbordered my-3">
                        <li class="list-group-item">
                            <b>Tournament Name: </b> <span class="float-right">{{ $poll->match->tournament->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Team 1: </b> <span class="float-right">{{ $poll->match->team1->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Team 2: </b> <span class="float-right">{{ $poll->match->team2->name }}</span>
                        </li>
                    </ul>
                    {{-- btn --}}
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('match.view',$poll->match->id) }}" class="btn btn-sm btn-primary btn-block">
                                More Details <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-primary card-outline">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-sm" href="#poll_details" data-toggle="tab">Poll Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm" href="#poll_update" data-toggle="tab">Update</a>
                    </li>
                </ul>
            </div>
            <div class="card-body tab-content">
                <div class="tab-pane active" id="poll_details">
                   <p>
                        <b>Question: </b> <span class="float-right">{{ $poll->question }}</span>
                    </p>
                    {{-- poll images --}}
                    @if(count($poll->images) > 0)
                    <p>
                        <b>Question's Images: </b>
                        <div class="row">
                            @foreach ($poll->images as $key => $item)
                            <div class="col-md-2 m-2 text-center item-{{$key}}">
                                <img src="{{ asset($item) }}" alt="" class="p-2 bd-3" height="150" width="150">
                                <span class="btn btn-sm btn-outline-danger deleteQuestionImage mt-2">
                                    <i class="fa-solid fa-trash"></i>
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </p>
                    @endif
                    <b>Question's Options: </b>
                    {{-- poll images --}}
                    <ul class="list-group list-group-unbordered my-3">
                        @for ($i = 1; $i <= 4; $i++)
                        @php
                            $option = 'option_'.$i;
                            if($option == $poll->answer)
                                $answer = $poll->$option;
                        @endphp
                        @if ($poll->$option)
                            <li class="list-group-item">
                                <b>Option {{$i}}: </b> <span class="float-right">
                                    {{ $poll->$option }}
                                </span>
                            </li>
                        @endif
                        @endfor
                    </ul>
                    <p>
                        <b>Question Answer: </b>
                        <span class="float-right">
                            {{ $answer }}
                        </span>
                    </p>
                </div>
                <div class="tab-pane" id="poll_update">
                    @include('poll.edit')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(function(){
        addNewQuestionImageHandler();
        optionTypeHandler();
        addNewOptionHandler();
        tabHandler();
        questionImageDeleteHandler();
    });

    questionImageDeleteHandler = () => {
        $(".deleteQuestionImage").click(function () {
            let item = $(this).parent().prop('classList')[3].split('-')[1];
            let poll_id = "{{ $poll->id }}";
            var url = "/admin/poll/image/" + poll_id + "/" + item + "/delete/";
            deleteItem(url, null, true);
        });
    }

    tabHandler = () =>{
        var is_edit = window.location.href.split('/')[window.location.href.split('/').length-1] == 'edit' ? true : false;
        // active tab
        if(is_edit){
            $('.nav-pills li:nth-child(1) a').removeClass('active');
            $('.tab-content div:nth-child(1)').removeClass('active');
            $('.nav-pills li:nth-child(2) a').addClass('active');
            $('.tab-content div:nth-child(2)').addClass('active');
        }
    }


    addNewQuestionImageHandler = () => {
        $(".addNewQuestionImage").click(function () {
            let image = "";
             image = `
            <div class="form-group">
                <label for="question_images" class="optional">Question Image</label>
                <div class="row">
                    <div class="col-md-11">
                        <input type="file" class="form-control" name="question_images[]">
                    </div>
                    <div class="col-md-1 text-left">
                        <button type="button" class="btn btn-sm btn-outline-danger removeNewQuestion"><i class="fa-solid fa-minus"></i></button>
                    </div>
                </div>
            </div>`;
            $("#append_question_image").append(image);
            removeNewQuestionHandler();
        });
    }

    removeNewQuestionHandler = () => {
        $(".removeNewQuestion").click(function () {
            $(this).parent().parent().parent().remove();
        });
    }

    optionTypeHandler = () => {
        $("#option_type").change(function(){
            let type = $(this).val();
            type = parseInt($(this).val());
            $("#append_option").html('');
            type == 1 ? type = 'file' : type = 'text';
            let image = '';
            let answerOption = '<option value="" selected disabled>Select Answer</option>';
            for (let index = 1; index <= 2; index++) {
                image += `
                <div class="form-group">
                    <label for="option${index}" class="required">Option ${index}</label>
                    <div class="row">
                        <div class="col-md-11">
                            <input type="${type}" class="form-control" name="option${index}" id="option${index}" placeholder="Enter your option">
                        </div>
                    </div>
                </div>`;
                answerOption += `
                <option value="option_${index}">Option ${index}</option>
                `;
            }
            $("#append_option").append(image);
            $(".addNewOption").show();

            $(".append_option_btn").html(`
                <button type="button" class="btn btn-sm btn-outline-mahogany mb-3 addNewOption"><i class="fa-solid fa-plus"></i>
                    Add Option</button>
            `);
            $("#answer").html(answerOption);
        });
    }

    addNewOptionHandler = () => {
        $(document).on("click",".addNewOption",function () {
            let type = $("#option_type").val();
            type = parseInt($("#option_type").val());
            type == 1 ? type = 'file' : type = 'text';
            let index = parseInt($('#append_option').children('.form-group').last().find('label').attr('for').split('option')[1]);
            index = index + 1;
            let option = `
            <div class="form-group">
                <label for="option${index}" class="optional">Option ${index}</label>
                <div class="row">
                    <div class="col-md-11">
                        <input type="${type}" class="form-control" name="option${index}" id="option${index}" placeholder="Enter your option">
                    </div>
                    <div class="col-md-1 text-left">
                        <button type="button" class="btn btn-sm btn-outline-danger removeNewOption"><i
                                class="fa-solid fa-minus"></i></button>
                    </div>
                </div>
            </div>`;
            $("#append_option").append(option);


            appendAnswerOptionHandler(index);

            if(index == 4){
                $(".addNewOption").hide();
            }


        });

        $(document).on("click", ".removeNewOption", function () {
            $(this).closest(".form-group").remove();
            $(".addNewOption").show();
            let index = parseInt($('#append_option').children('.form-group').last().find('label').attr('for').split('option')[1]);
            $("#answer option[value='option_"+index+"']").remove();
            if(index == 4)
                index = 3;

            $('#append_option').children('.form-group').last().find('label').attr('for', 'option'+index);
            $('#append_option').children('.form-group').last().find('label').html('Option '+index);
            $(".append_option_btn").html('');
            $(".append_option_btn").html(`
            <button type="button" class="btn btn-sm btn-outline-mahogany mb-3 addNewOption"><i class="fa-solid fa-plus"></i>
                Add Option</button>
            `);
        });

    }


    appendAnswerOptionHandler = (index) => {
        let answerOption = `
            <option value="option_${index}">Option ${index}</option>
        `;
        $("#answer").append(answerOption);
    }




</script>
@endpush
