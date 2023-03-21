@extends('layouts.web')

@section('head')
@endsection

@section('content')
<section id="top-banner-panel">
    <div class="container">
        <div class="row row-cols-3 row-cols-sm-3 justify-content-center">
            <div class="col-2 text-left">
                <a href="{{URL::previous()}}">
                    <img src="{{asset('web/images/back-arrow.png')}}" class="img-fluid">
                </a>
            </div>
            <div class="col-6 text-center">
                <h1 class="text-center" style="font-size:1.8rem;">Leaderboard</h1>
            </div>
            <div class="col-2 text-right">
                <a href="{{route('public.account.index')}}">
                    <img src="{{asset('web/images/profile-img.png')}}" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</section>
<section id="content-body-panel">
    <div class="container mb-5">
        <div class="row justify-content-center">

            <div class="col-12">
                <div class="leaderboard-table">

                    <!--Table-->
                    <table class="table table-hover  table-fixed table-striped border-0 table-borderless">

                        <!--Table head-->
                        <thead>
                            <tr>
                                <th style="text-align: center;" class="rangking-panel">Rangking</th>
                                <th>Mobile No</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row" class="rangking-panel">
                                    <p class="fstnumber">
                                        1
                                    </p>
                                </td>
                                <td class="tbl-middel">01320000005</td>
                                <td style="vertical-align: middle;">
                                    <p class="fstscore">150</p>
                                </td>
                            </tr>

                            <tr>
                                <td scope="row" class="rangking-panel">
                                    <p class="scndnumber">
                                        2
                                    </p>
                                </td>
                                <td class="tbl-middel">01320000005</td>
                                <td style="vertical-align: middle;">
                                    <p class="sendscore">140</p>
                                </td>

                            </tr>
                            <tr>
                                <td scope="row" class="rangking-panel">
                                    <p class="thrdnumber">
                                        3
                                    </p>
                                </td>
                                <td class="tbl-middel">01724000005</td>
                                <td style="vertical-align: middle;">
                                    <p class="trrdscore">130</p>
                                </td>

                            </tr>
                            <tr>
                                <td scope="row" class="rangking-panel">
                                    <p class="number">
                                        4
                                    </p>
                                </td>
                                <td class="tbl-middel">01924000007</td>
                                <td style="vertical-align: middle;">
                                    <p class="tablescore">120</p>
                                </td>

                            </tr>
                            <tr>
                                <td scope="row" class="rangking-panel">
                                    <p class="number">
                                        5
                                    </p>
                                </td>
                                <td class="tbl-middel">01774000010</td>
                                <td style="vertical-align: middle;">
                                    <p class="tablescore">110</p>
                                </td>

                            </tr>
                            <tr>
                                <td scope="row" class="rangking-panel">
                                    <p class="number">
                                        6
                                    </p>
                                </td>
                                <td class="tbl-middel">01889000005</td>
                                <td style="vertical-align: middle;">
                                    <p class="tablescore">100</p>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row" class="rangking-panel">
                                    <p class="number">
                                        7
                                    </p>
                                </td>
                                <td class="tbl-middel">01889000005</td>
                                <td style="vertical-align: middle;">
                                    <p class="tablescore">100</p>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row" class="rangking-panel">
                                    <p class="number">
                                        8
                                    </p>
                                </td>
                                <td class="tbl-middel">01889000005</td>
                                <td style="vertical-align: middle;">
                                    <p class="tablescore">100</p>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row" class="rangking-panel">
                                    <p class="number">
                                        9
                                    </p>
                                </td>
                                <td class="tbl-middel">01889000005</td>
                                <td style="vertical-align: middle;">
                                    <p class="tablescore">100</p>
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
</section>
@endsection

@push('js')
<script type='text/javascript'>
    $('.t-bottom').click(function () {
            $('.bottom').toggleClass('active');
        });
</script>
@endpush
