@extends('layouts.app')

@section('title')
| Dashboard
@endsection


@section('head')
<style>
    .small-box {
        transition: all 0.3s ease-in-out;
    }

    .color>.fa-cog {
        animation: spin 4s linear infinite !important;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .small-box>.icon>i {
        animation: pulse 2s linear infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1);
        }
    }


    .small-box-footer>i {
        animation: run 3s linear infinite;
    }

    @keyframes run {
        0% {
            transform: translateX(0);
        }

        50% {
            transform: translateX(10px);
        }

        100% {
            transform: translateX(0);
        }
    }

    .bg-orange {
        background-color: #FB6600 !important;
        color: #ffffff !important;
    }

    .bg-orange>.small-box-footer {
        color: #ffffff !important;
    }

    .bg-salmon {
        background-color: #FA8071 !important;
        color: #ffffff !important;
    }


    .bg-plum {
        background-color: #fda6fd !important;
        color: #000000 !important;
    }

    .bg-plum>.small-box-footer {
        color: #000000 !important;
    }

    .bg-grape {
        background-color: #6E2CA8 !important;
        color: #ffffff !important;
    }

    .bg-grape>.small-box-footer {
        color: #ffffff !important;
    }
</style>
@endsection

@section('content')
<!-- Main content -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$users}}</h3>
                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="{{route('user.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$sports}}</h3>
                        <p>Total Sports</p>
                    </div>
                    <div class="icon services">
                        <i class="fa-solid fa-person-running"></i>
                    </div>
                    <a href="{{route('sports.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$sports}}</h3>
                        <p>Aviable Tournaments</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-trophy"></i>
                    </div>
                    <a href="{{route('tournament.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>
                            {{$teams}}
                        </h3>
                        <p>Total Teams</p>
                    </div>
                    <div class="icon color">
                        <i class="fa-solid fa-people-group"></i>
                    </div>
                    <a href="{{route('team.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>
                            {{$matches}}
                        </h3>
                        <p>Available Matches</p>
                    </div>
                    <div class="icon color">
                        <i class="fa-solid fa-fire-flame-curved"></i>
                    </div>
                    <a href="{{route('match.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>
                            {{$polls}}
                        </h3>
                        <p>Total Polls</p>
                    </div>
                    <div class="icon color">
                        <i class="fa-solid fa-dice"></i>
                    </div>
                    <a href="{{route('poll.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        colorCard();
    });

    function colorCard() {
        var colors = [
            'bg-primary',
            'bg-secondary',
            'bg-success',
            'bg-danger',
            'bg-warning',
            'bg-info',
            'bg-dark',
            'bg-orange',
            'bg-salmon',
            'bg-plum',
            'bg-grape',
        ];
        setInterval(() => {
            var random = Math.floor(Math.random() * colors.length);
            var randomBox = Math.floor(Math.random() * $('.small-box').length);
            $('.small-box').eq(randomBox).removeClass(colors.join(' '));
            $('.small-box').eq(randomBox).addClass(colors[random]);
            if(colors[random] == 'bg-dark'){
                $('.small-box').eq(randomBox).addClass('text-white');
            }
        }, 3000);
    }
</script>
@endpush
