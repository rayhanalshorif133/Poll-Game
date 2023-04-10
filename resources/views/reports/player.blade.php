@extends('layouts.app')

@section('head')
<style>
    .breadcrumb{
        background-color: transparent!important;
    }
    .content-header h1 {
        font-size: 1.8rem;
        margin: 0;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #17a2b8;
    }
    .nav-pills .nav-link:not(.active):hover {
        color: #17a2b8;
    }

    .btn-purple {
        color: #fff;
        background-color: #6217b8;
        border-color: #6217b8;
    }
    .btn-purple:hover {
        color: #fff;
        background-color: #6217b8;
        border-color: #6217b8;
    }
    .fa-2xl{
        font-size: 4rem;
    }


    .player_infomation{
        margin: 0 auto;
        width: 100%;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Player's Report</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Player's Report</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#player_s_Info" data-toggle="tab">
                    <i class="fas fa-user"></i> Player's Info
                </a></li>
                <li class="nav-item">
                    <a class="nav-link" href="#chart_view" data-toggle="tab">
                    Chart View
                </a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="player_s_Info">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Player's Search By Phone Number
                                </h3>
                            </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-sm-4 col-form-label">
                                            Enter phone number
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="phone_number" placeholder="Phone Number">
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
                        <div class="col-md-5">
                            <div class="card card-purple">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Player's Information
                                </h3>
                            </div>
                            <div class="card-body">
                                <dl class="row player_infomation">
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
                    Joining Chats
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
 <script src="{{asset('js/admin/reports/player.js')}}"></script>
@endpush
