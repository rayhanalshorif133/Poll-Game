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
                        <h3 class="profile-username text-center text-bold">Match Details</h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Title</b> <a class="float-right">{{$subscription[0]->match->title}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Start Date</b> <a class="float-right">{{$subscription[0]->match->start_date_time}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>End Date</b> <a class="float-right">{{$subscription[0]->match->end_date_time}}</a>
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
                                        <table class="table table-hover text-nowrap table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>User</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Reason</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>183</td>
                                                    <td>John Doe</td>
                                                    <td>11-7-2014</td>
                                                    <td><span class="tag tag-success">Approved</span></td>
                                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                </tr>
                                                <tr>
                                                    <td>219</td>
                                                    <td>Alexander Pierce</td>
                                                    <td>11-7-2014</td>
                                                    <td><span class="tag tag-warning">Pending</span></td>
                                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                </tr>
                                                <tr>
                                                    <td>657</td>
                                                    <td>Bob Doe</td>
                                                    <td>11-7-2014</td>
                                                    <td><span class="tag tag-primary">Approved</span></td>
                                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                </tr>
                                                <tr>
                                                    <td>175</td>
                                                    <td>Mike Doe</td>
                                                    <td>11-7-2014</td>
                                                    <td><span class="tag tag-danger">Denied</span></td>
                                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="timeline">
                                CHart
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

@endpush
