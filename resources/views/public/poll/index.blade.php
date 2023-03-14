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
                <h1 class="text-center" style="font-size:2rem;">BAN VS SA</h1>
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
                <div class="col-md-12">
                    <h2 class="text-left d-block text-body poll-will-win-title">Who will win today?
                    </h2>
                    <div class="poll-part">
                        <div class="poll-match-table">

                            <!--Table-->
                            <table class="table table-hover  table-fixed table-striped border-0 table-borderless">

                                <tbody>
                                    <tr>
                                        <td scope="row" style="vertical-align: middle;" class="flag-one">
                                            <label class="img-size-one">
                                                <input type="radio" name="test" value="small" checked>
                                                <img src="{{asset('web/images/bangladesh.png')}}" class="poll-flag-one img-fluid"
                                                    alt="...">
                                            </label>
                                        </td>

                                        <td style="vertical-align: middle;" class="flag-two">
                                            <label class="img-size-two">
                                                <input type="radio" name="test" value="small" checked>
                                                <img src="{{asset('web/images/australia.png')}}" class="poll-flag-two img-fluid "
                                                    alt="...">
                                            </label>
                                        </td>
                                    </tr>

                                </tbody>
                                <!--Table body-->
                            </table>
                            <!--Table-->
                        </div>
                    </div>
                </div>
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
