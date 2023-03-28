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
                <h1>Participate Details</h1>
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

                        </ul>
                        <a href="#" class="btn btn-primary btn-block"><b>
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
                                <a class="nav-link" href="#timeline" data-toggle="tab">
                                    Chart View
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                {{-- table --}}
                                <div class="row">
                                    <div class="col-12">
                                        <table
                                            class="table table-hover text-nowrap table-bordered subscription_details">
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

                            <div class="tab-pane" id="timeline">
                                Chart
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

<script>
    $(function() {
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
    });
</script>

@endpush
