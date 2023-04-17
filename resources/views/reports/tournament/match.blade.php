@extends('layouts.app')

@section('head')
<style>



</style>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tournament's Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Tournament's Report</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#match-based" data-toggle="tab">Match Based</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="match-based">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Tournament & Match Search Field
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="tournament" class="col-sm-4 col-form-label">
                                            Select a tournament
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" id="tournament" placeholder="Select a tournament">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="match" class="col-sm-4 col-form-label">
                                            Select a match
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" id="match" placeholder="Select a match">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-default reset-btn">
                                        <i class="fas fa-times"></i> Reset
                                    </button>
                                    <button type="button" class="btn btn-outline-info float-right search-btn">
                                        <i class="fas fa-search"></i> Search
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-purple">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Poll's Information
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <dl class="row poll_infomation">
                                        {{-- <i class="fa-solid fa-spinner fa-2xl mt-5 text-center"></i> --}}
                                        <div class="spinner">
                                            <div class="bounce1"></div>
                                            <div class="bounce2"></div>
                                            <div class="bounce3"></div>
                                            <div class="bounce4"></div>
                                            <div class="bounce5"></div>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-forest">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Player's Subscribed Tournament List
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <dl class="row player_subscribed_tournament">
                                        {{-- <i class="fa-solid fa-spinner fa-2xl mt-5 text-center"></i> --}}
                                        <div class="spinner">
                                            <div class="bounce1"></div>
                                            <div class="bounce2"></div>
                                            <div class="bounce3"></div>
                                            <div class="bounce4"></div>
                                            <div class="bounce5"></div>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card card-egyptian">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Player's Participate List
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <dl class="row player_participate_tournament">
                                        <div class="spinner">
                                            <div class="bounce1"></div>
                                            <div class="bounce2"></div>
                                            <div class="bounce3"></div>
                                            <div class="bounce4"></div>
                                            <div class="bounce5"></div>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane" id="chart_view">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="card card-forest">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Player's Point Chart Match Based
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="search-phone-number-chart" class="col-sm-4 col-form-label">
                                            Select phone number
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="number" id="search-phone-number-chart" placeholder="Select Phone Number">
                                        </div>
                                        <label for="match_title" class="col-sm-4 col-form-label mt-3">
                                            Select Match Title
                                        </label>
                                        <div class="col-sm-8 mt-3">
                                            <input type="text" id="match_title_chart" placeholder="Select Match">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="button" class="btn btn-default resetBtn">
                                        <i class="fas fa-times"></i> Reset
                                    </button>
                                    <button type="button" class="btn btn-outline-forest float-right searchBtn">
                                        <i class="fas fa-search"></i> Search
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card card-egyptian">
                                <div class="card-header d-flex">
                                    <h3 class="card-title">
                                        Player's Point Chart View
                                    </h3>
                                    {{-- toggle btn --}}
                                    <div class="btn-group ml-auto">
                                        <input type="checkbox" class="btn btn-tool chartViewToggler" data-on="Line Chart"
                                            data-off="Bar Chart" data-toggle="toggle" data-onstyle="info">
                                        <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool text-white" data-card-widget="maximize">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <dl class="row player_participate_tournament">
                                        <div style="width: 100%;" class="point_chart_bar"><canvas id="point_chart_bar"></canvas>
                                        </div>
                                        <div style="width: 100%;" class="point_chart_line d-none"><canvas
                                                id="point_chart_line"></canvas></div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{asset('js/admin/reports/tournament.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
