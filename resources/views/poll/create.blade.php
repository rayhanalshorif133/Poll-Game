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
                        <div class="row">
                            <div class="col-md-11">
                                <select class="form-control" name="match_id" id="match_id">
                                    <option value="" selected disabled>Select Match</option>
                                    @foreach($matches as $match)
                                    <option value="{{$match->id}}" data-start={{$match->timeDiff($match->id)}}>{{$match->title}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="required">Choise the Day</label>
                        <div class="row">
                            <div class="col-md-11">
                                <select class="form-control" name="day" id="day">
                                    <option value="" selected disabled>Select day</option>
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="question" class="required">Question?</label>
                        <div class="row">
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="question" id="question" placeholder="Enter your question">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="question_images" class="optional">Question Image</label>
                        <div class="row">
                            <div class="col-md-11">
                                <input type="file" class="form-control" name="question_images[]">
                            </div>
                            <div class="col-md-1 text-left">
                                <button type="button" class="btn btn-sm btn-outline-mahogany addNewQuestionImage"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <span id="append_question_image"></span>
                    <div class="form-group">
                        <label for="name" class="required">Choise option's type</label>
                        <div class="row">
                            <div class="col-md-11">
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
                        </div>
                    </div>
                    <span id="append_option">
                        @for ($index = 1; $index <= 2; $index++)
                        <div class="form-group">
                            <label for="option{{$index}}" class="required">Option {{$index}}</label>
                            <div class="row">
                                <div class="col-md-11">
                                    <input type="text" class="form-control" name="option{{$index}}" id="option{{$index}}"
                                        placeholder="Enter your option">
                                </div>
                            </div>
                        </div>
                        @endfor
                    </span>
                    <button type="button" class="btn btn-sm btn-outline-mahogany mb-3 addNewOption"><i
                                    class="fa-solid fa-plus"></i> Add Option</button>
                    <div class="form-group">
                        <label for="name" class="required">Choise the Answer</label>
                        <div class="row">
                            <div class="col-md-11">
                                <select class="form-control" name="answer" id="answer">
                                    <option value="" selected disabled>Select Answer</option>
                                    @foreach($answerOptions as $answerOption)
                                    <option value="{{$answerOption['value']}}">{{$answerOption['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="form-group mt-1">
                        <label for="point" class="required">Point</label>
                        <div class="row">
                            <div class="col-md-11">
                                <input type="number" class="form-control" name="point" id="point" placeholder="Enter your point">
                            </div>
                        </div>
                    </div>
                </div>
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
        addNewQuestionImageHandler();
        optionTypeHandler();
        addNewOptionHandler();
        handleSelectDay();
    });

    handleSelectDay = () => {

        $("#match_id").on("change", function(){
            console.log("match_id", $(this).val());
        });
        $("#day").append(`
            <option value="1">Day 1</option>
            <option value="2">Day 2</option>
            <option value="3">Day 3</option>`
        );
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

            $("#answer").html(answerOption);
        });
    }

    addNewOptionHandler = () => {
        $(".addNewOption").click(function () {
            let type = $("#option_type").val();
            type = parseInt($("#option_type").val());
            type == 1 ? type = 'file' : type = 'text';
            let index = $(".form-group").length - 4;
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

            let index = $(".form-group").length - 4;
            $("#answer option[value='option_"+index+"']").remove();
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
