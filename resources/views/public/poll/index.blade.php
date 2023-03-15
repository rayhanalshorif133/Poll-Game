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
                <h1 class="text-center" style="font-size:2rem;">{{$match->team1->name}} VS {{$match->team2->name}}</h1>

            </div>
            <div class="col-2 text-center">

            </div>
        </div>
    </div>
</section>
<form action="" method="post">
    <section id="content-body-panel">
        <div class="container">
            <div class="row">
                @if(count($match->poll) >  0)
                @foreach ($match->poll as $key => $poll)
                <div class="col-md-12">
                    <h2 class="text-left d-block text-body poll-will-win-title">
                        {{$poll->question}}
                    </h2>
                    <div class="poll-part">
                        <div class="poll-match-table">
                            <table class="table table-hover  table-fixed table-striped border-0 table-borderless">
                                <tbody>
                                    <tr>
                                        @for ($index = 1; $index <= 4; $index++)
                                            @php
                                                $option = 'option_'.$index;
                                                $option = $poll->$option;
                                            @endphp
                                            @if($option != null)
                                                @if($poll->option_type == 'image')
                                                    <td scope="row" style="vertical-align: middle;" class="flag-one">
                                                        <label class="img-size-one">
                                                            <input type="radio" name="option-{{$key}}" value="small" checked>
                                                            <img src="{{asset($option)}}" class="poll-flag-one img-fluid"
                                                                alt="...">
                                                        </label>
                                                    </td>
                                                @else
                                                    <td scope="row" style="vertical-align: middle;" class="flag-one">
                                                        <label class="img-size-one">
                                                            <input type="radio" name="option-{{$key}}" value="small" checked>
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
            <div class="row  justify-content-center my-4">
                <div class="submit-btn-panel">
                    <div class="col-md-auto">
                        <div class="poll-cotinue-fixed-btn">
                            <a href="#" class="poll-get-strart-btn">
                                Submit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</form>
@endsection

@push('js')

@endpush
