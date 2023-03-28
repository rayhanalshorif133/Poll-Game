@extends('layouts.app')

@section('head')
<style>

</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Subcription Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Subcription Details</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">

                    <div class="card-body box-profile">
                        <h3 class="profile-username text-left text-bold">Match Details</h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Title</b> <a class="float-right">{{$subscription[0]->match->title}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Team</b> <a class="float-right">
                                    {{$subscription[0]->match->team1->name}} vs
                                    {{$subscription[0]->match->team2->name}}
                                </a>
                            </li>
                            @php
                            $start_date = date('d M Y h:i A', strtotime($subscription[0]->match->start_date_time));
                            $end_date = date('d M Y h:i A', strtotime($subscription[0]->match->end_date_time));
                            @endphp
                            <li class="list-group-item">
                                <b>Start Date</b> <a class="float-right">{{$start_date}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>End Date</b> <a class="float-right">{{$end_date}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Duration</b> <a class="float-right">
                                    <span class="timeDiff">{{$subscription[0]->match->timeDiff($subscription[0]->match->id)}}</span> Days
                                </a>
                            </li>

                        </ul>
                        <a href="{{route('match.view',$subscription[0]->match->id)}}" class="btn btn-primary btn-block"><b>
                            See More <i class="fa-solid fa-angles-right"></i>
                        </b></a>
                    </div>

                </div>

            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#activity" data-toggle="tab">
                                    Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#bar_chart" data-toggle="tab">
                                    Chart View
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">
                                {{-- table --}}
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-hover text-nowrap table-bordered subscription_details">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Phone</th>
                                                    <th>Subscribed At</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="bar_chart">
                                <div style="width: 100%;">
                                    <canvas id="subscribed_bar_chart"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>

<script>
    $(function() {
        handleSubscriptionDetailsTable();
        chartHandler();
    });

 handleSubscriptionDetailsTable = () => {
        var table = $('.subscription_details').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('subscription.details', $subscription[0]->match_id) }}",
            columns: [{
                    render: function(data, type, row) {
                        return row.DT_RowIndex;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        return row.account.phone;
                    },
                    targets: 0,
                },
                {
                    render: function(data, type, row) {
                        // moment js
                        return moment(row.created_at).calendar();
                    },
                    targets: 0,
                },
            ]
        });
    }

     chartHandler = () =>{

        var ctx = document.getElementById('subscribed_bar_chart').getContext('2d');
        let match_id = {{$subscription[0]->match_id}};
        let labels = [];
        let data = [];


        axios.get(`/subscription/${match_id}/bar-chart-details/`)
            .then(function(response){
                var resData = response.data.data;
                let timeDiff = $('.timeDiff').text();
                timeDiff = parseInt(timeDiff);
                resData.forEach((item, index) => {
                    console.log(item);
                    if(item.day == index+1){
                        data.push(item.subscription);
                    }
                    labels.push("Day "+(index+1));
                });
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Subscribed Users',
                            data: data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                },
                                title: {
                                    display: true,
                                    text: 'Number of Subscribed Users'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Day Based Subscribed Users'
                                }
                            }
                        }
                    }
                });
            });

    }
</script>

@endpush
