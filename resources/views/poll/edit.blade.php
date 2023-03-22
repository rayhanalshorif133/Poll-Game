<form action="{{route('poll.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
            <input type="hidden" name="update_poll_id" value="{{$poll->id}}">
            <label for="name" class="required">Choise the Match</label>
            <div class="row">
                <div class="col-md-11">
                    <select class="form-control" name="match_id" id="match_id">
                        @foreach($matches as $match)
                        @if($match->id == $poll->match_id)
                        <option value="{{$match->id}}" selected data-timeDiff={{$match->timeDiff($match->id)}}>{{$match->title}}</option>
                        @else
                        <option value="{{$match->id}}" data-timeDiff={{$match->timeDiff($match->id)}}>{{$match->title}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="required">Choise the Day</label>
                <div class="row">
                    <div class="col-md-11">
                        <select class="form-control" name="match_day" id="match_day">
                            <option value="" selected disabled>Select day</option>
                            @for ($index = 1; $index <= $poll->match->timeDiff($poll->match->id); $index++)
                                @if($poll->day == $index)
                                    <option value="{{$index}}" selected>Day-{{$index}}</option>
                                @else
                                    <option value="{{$index}}">Day-{{$index}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="question" class="required">Question?</label>
                <div class="row">
                    <div class="col-md-11">
                        <input type="text" class="form-control" name="question" id="question"
                            placeholder="Enter your question" value="{{$poll->question}}">
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
                        <button type="button" class="btn btn-sm btn-outline-mahogany addNewQuestionImage"><i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <span id="append_question_image"></span>
            <div class="form-group">
                <label for="name" class="required">Choise option's type</label>
                <div class="row">
                    <div class="col-md-11">
                        <select class="form-control" name="option_type" id="option_type">
                            @if($poll->option_type == 'text')
                                <option value="0" selected="">Text</option>
                                <option value="1">Image</option>
                            @else
                                <option value="0">Text</option>
                                <option value="1" selected="">Image</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            @php
            $optionBtn = false;
            $countOfOption = 0;
            @endphp
            <span id="append_option">
                @for ($index = 1; $index <= 4; $index++)
                    @php
                    $option='option_' .$index;
                    @endphp
                    @if ($poll->$option)
                        @php
                        $countOfOption++;
                        @endphp
                        <div class="form-group">
                            <label for="option{{$index}}" class="@if($poll->option_type == 'text') required @else optional @endif">Option {{$index}}</label>
                            <div class="row">
                                <div class="col-md-11">
                                    @if($poll->option_type == 'text')
                                    <input type="text" class="form-control" name="option{{$index}}" id="option{{$index}}"
                                    placeholder="Enter your option" value="{{ $poll->$option }}">
                                    @else
                                    <a class="example-image-link" href="{{ asset($poll->$option) }}"
                                        data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img
                                            class="example-image m-3" width="100px" height="100px" src="{{ asset($poll->$option) }}" alt="" /></a>
                                    <input type="file" class="form-control" name="option{{$index}}" id="option{{$index}}"
                                    placeholder="Enter your option" value="{{ $poll->$option }}">
                                    @endif
                                </div>
                                @if($index > 2)
                                <div class="col-md-1 text-left">
                                    <button type="button" class="btn btn-sm btn-outline-danger removeNewOption">
                                        <i class="fa-solid fa-minus"></i></button>
                                </div>
                                @endif
                                @if ($index < 3)
                                    @php
                                    $optionBtn = true;
                                    @endphp
                                @else
                                    @php
                                    $optionBtn = false;
                                    @endphp
                                @endif
                            </div>
                        </div>
                    @endif
                @endfor
            </span>
            <span class="append_option_btn"></span>
            @if($optionBtn)
             <button type="button" class="btn btn-sm btn-outline-mahogany mb-3 addNewOption"><i class="fa-solid fa-plus"></i>
            Add Option</button>
            @endif
    <div class="form-group">
            <label for="name" class="required">Choise the Answer</label>
            <div class="row">
                <div class="col-md-11">
                    <select class="form-control" name="answer" id="answer">
                        @for ($index = 1; $index <= $countOfOption; $index++)
                            @php
                            $value='option_' .$index;
                            @endphp
                            @if($poll->answer == $value)
                                <option value="{{$poll->$value}}" selected>Option {{$index}}</option>
                            @else
                                <option value="{{$value}}">Option {{$index}}</option>
                            @endif
                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-group mt-1">
                <label for="point" class="required">Point</label>
                <div class="row">
                    <div class="col-md-11">
                        <input type="number" class="form-control" name="point" id="point"
                            placeholder="Enter your point" value="{{ $poll->point }}">
                    </div>
                </div>
            </div>
    </div>
    <button type="submit" class="btn btn-mahogany">Submit</button>
</form>
