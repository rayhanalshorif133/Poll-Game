@extends('layouts.app')

@section('head')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
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
    .ts-control {
        padding: 10px 12px!important;
    }
</style>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Player's Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Player's Report</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="#player_s_Info" data-toggle="tab">
                    <i class="fas fa-user"></i> Player's Info
                </a></li>
                <li class="nav-item">
                    <a class="nav-link active" href="#chart_view" data-toggle="tab">
                    Chart View
                </a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane" id="player_s_Info">
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

                <div class="tab-pane active" id="chart_view">
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
                                    <button type="button" class="btn btn-default reset-btn">
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
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Player's Point Chart View
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <dl class="row player_participate_tournament">
                                        <div class="spinner d-none">
                                            <div class="bounce1"></div>
                                            <div class="bounce2"></div>
                                            <div class="bounce3"></div>
                                            <div class="bounce4"></div>
                                            <div class="bounce5"></div>
                                        </div>
                                        <div style="width: 800px;"><canvas id="acquisitions"></canvas></div>
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
 <script src="{{asset('js/admin/reports/player.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 <script>
    var phoneNumberChart = "";
    var match_title_chart = "";
    $(function() {
        handleSearchField();
        $(".searchBtn").on('click',handleSearchBtn);
    });

    handleSearchBtn = () => {
        $(".searchBtn").find('i').removeClass('fa-search').addClass('fa-spinner fa-spin');
        $(".spinner").removeClass('d-none');
        let player_id = phoneNumberChart.getValue();
        let match_id = match_title_chart.getValue();
        player_id = 1001;
        match_id = 1;
        axios.get(`/report/player/search/point/${player_id}/${match_id}`)
            .then(response => {
                let data = response.data.data;
                console.log(data[0].total_days);

                const ctx = document.getElementById('acquisitions');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

            setTimeout(() => {
                $(".searchBtn").find('i').removeClass('fa-spinner fa-spin').addClass('fa-search');
            }, 1000);
        });
    }

    handleSearchField = () =>{
        phoneNumberChart = new TomSelect("#search-phone-number-chart",{
        persist: false,
        create: false,
        loadingClass: 'loading',
        maxOptions: 20,
        minItems: 1,
        maxItems: 1,
        valueField: 'id',
        labelField: 'phone',
        searchField: ['phone'],
        options: [],
        render: {
        option: function(item, escape) {
        return (
        '<div>' +
            '<span class="phone">' +
                '<span class="label">' +
                    escape(item.phone) +
                    '</span>' +
                '</span>' +
            '</div>'
        );
        },
        item: function(item, escape) {
        return (
        '<div>' +
            '<span class="phone">' +
                '<span class="label">' +
                    escape(item.phone) +
                    '</span>' +
                '</span>' +
            '</div>'
        );
        }
        },
        load: function(query, callback) {
        if (!query.length) return callback();
        axios.get(`/report/player/search-by-phone-numbers/${query}`)
        .then(function(response) {
        callback(response.data);
        })
        .catch(function(error) {
        console.log(error);
        });
        }
        });





        match_title_chart = new TomSelect("#match_title_chart",{
        persist: false,
        create: false,
        loadingClass: 'loading',
        maxOptions: 20,
        minItems: 1,
        maxItems: 1,
        valueField: 'id',
        labelField: 'title',
        searchField: ['title'],
        options: [],
        render: {
        option: function(item, escape) {
        return (
        '<div>' +
            '<span class="title">' +
                '<span class="label">' +
                    escape(item.title) +
                    '</span>' +
                '</span>' +
            '</div>'
        );
        },
        item: function(item, escape) {
        return (
        '<div>' +
            '<span class="title">' +
                '<span class="label">' +
                    escape(item.title) +
                    '</span>' +
                '</span>' +
            '</div>'
        );
        }
        },
        load: function(query, callback) {
        if (!query.length) return callback();
        axios.get(`/report/player/search-by-match-title/${query}`)
        .then(function(response) {
        callback(response.data);
        })
        .catch(function(error) {
        console.log(error);
        });
        }

        });
    }


</script>
@endpush
