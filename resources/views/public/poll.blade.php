@extends('layouts.web')

@section('head')
@endsection

@section('content')
<section id="top-banner-panel">
    <div class="container">
        <div class="row row-cols-3 row-cols-sm-3 justify-content-center">
            <div class="col-2 text-left">
                <a href="{{route('public.sports-page.index',$match->tournament->sports->id)}}">
                    <img src="{{asset('web/images/back-arrow.png')}}" class="img-fluid">
                </a>
            </div>
            <div class="col-8 text-center">
                <h1 class="text-center" style="font-size:2rem;">{{$match->team1->name}} VS <br>{{$match->team2->name}}</h1>

            </div>
            <div class="col-2 text-center">
                <h1 class="text-center" style="font-size:2rem;">
                    Day 2
                </h1>
            </div>
        </div>
    </div>
</section>

@if($findParticipate)
 <section id="content-body-panel">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center d-block text-body poll-will-win-title">
                    You have already participated in this poll
                </h2>
            </div>
            <hr>
        </div>
        <div class="row  justify-content-center my-4">
            <div class="submit-btn-panel">
                <div class="col-md-auto">
                    <div class="poll-cotinue-fixed-btn" style="color:#ffffff;background:#d25b5b;box-shadow: #d25b5b 0 7px 0;">
                        <a href="{{URL::previous()}}">
                            <button type="button" class="poll-get-strart-btn">
                                Cancel
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</section>
@else
<form action="{{route('public.poll_submit')}}" method="post">
    @csrf
    <section id="content-body-panel">
            <div class="container">
            <input type="hidden" name="match_id" value="{{$match->id}}">
            <div class="row">
                @if(count($match->poll) >  0)
                @foreach ($match->poll as $key => $poll)
                <div class="col-md-12">
                    <h2 class="text-left d-block text-body poll-will-win-title">
                        {{$poll->question}}
                        <input type="hidden" name="poll_ids[]" value="{{$poll->id}}">
                    </h2>
                    @if($poll->images != null)
                        @php
                            $images = json_decode($poll->images);
                        @endphp
                        <div class="row d-flex justify-content-around">
                            @foreach ($images as $image)
                            <div class="col-md-3">
                                <img src="{{asset($image)}}" class="h-100 w-50" alt="...">
                            </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="poll-part">
                        <div class="poll-match-table">
                            <table class="table table-hover  table-fixed table-striped border-0 table-borderless">
                                <tbody>
                                    <tr>
                                        @for ($index = 1; $index <= 4; $index++)
                                            @php
                                                $option = 'option_'.$index;
                                                $value = $option;
                                                $option = $poll->$option;
                                            @endphp
                                            @if($option != null)
                                                @if($poll->option_type == 'image')
                                                    <td scope="row" style="vertical-align: middle;" class="flag-one">
                                                        <label class="img-size-one">
                                                            <input type="radio" name="given_ans_poll_id_{{$poll->id}}" value="{{$value}}" checked>
                                                            <img src="{{asset($option)}}" class="poll-flag-one img-fluid"
                                                                alt="...">
                                                        </label>
                                                    </td>
                                                @else
                                                    <td scope="row" style="vertical-align: middle;" class="flag-one">
                                                        <label class="img-size-one">
                                                            <input type="radio" name="given_ans_poll_id_{{$poll->id}}" value="{{$value}}" checked>
                                                            <span class="poll-flag-one img-fluid">{{$option}}</span>
                                                        </label>
                                                    </td>
                                                @endif
                                            @endif
                                        @endfor
                                    </tr>

                                </tbody>
                                <!--Table body-->
                            </table>
                            <!--Table-->
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
                @else
                <div class="col-md-12">
                    <h2 class="text-left d-block text-body poll-will-win-title">No Poll Found
                    </h2>
                </div>
                @endif
            </div>
            @if(count($match->poll) > 0)
            <div class="row  justify-content-center my-4">
                <div class="submit-btn-panel">
                    <div class="col-md-auto">
                        <div class="poll-cotinue-fixed-btn">
                            <button type="submit" class="poll-get-strart-btn">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    </section>
</form>
@endif
@endsection

@push('js')

@endpush
