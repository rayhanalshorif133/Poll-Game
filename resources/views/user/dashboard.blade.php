@extends('layouts.app')


@section('page_title')
User Dashboard
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
                    <a href="#" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6 d-none">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3></h3>
                        <p>Available Services</p>
                    </div>
                    <div class="icon services">
                        <i class="fa-solid fa-gears"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6 d-none">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>#</h3>
                        <p>Total Sliders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6 d-none">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>
                            345
                        </h3>
                        <p>Available Colors</p>
                    </div>
                    <div class="icon color">
                        <i class="fa fa-cog"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i
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
