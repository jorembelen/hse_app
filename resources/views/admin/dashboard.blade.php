@extends('layouts.master')

@section('title', 'HSE Web App')

<link href="/admin/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
@section('content')

<div class="row">
    <div class="col-12 col-sm-6 col-xxl d-flex">
        <div class="card illustration flex-fill">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row no-gutters w-100">
                    <div class="col-6">
                        <div class="illustration-text p-3 m-1">
                            <h4 class="illustration-text">Welcome Back, {{ Auth::user()->name }}!</h4>
                            <p class="mb-0">HSE | Dashboard</p>
                        </div>
                    </div>
                    <div class="col-6 align-self-end text-right">
                        <img src="/assets/img/illustrations/customer-support.png" alt="Customer Support" class="img-fluid illustration-img">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin' || auth()->user()->role == 'gm'
|| auth()->user()->role == 'hsem' || auth()->user()->role == 'member' || auth()->user()->role == 'hse-member')
<div class="row">
    <div class="col-6 col-md-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Incident Type</h5>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div id="category-bar"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3 col-sm-3 col-xxl-3">
        <div class="card">
            <div class="card-body">

                <div class="widget widget-five">
                    <div class="widget-content">

                        <div class="header">
                            <div class="header-body">
                                <h6>Notifications</h6>
                            </div>
                        </div>

                        <div class="w-content">
                            <div class="">
                                <p class="task-left">{{$data[8]}}</p>
                                <p class="task-completed"><span>Awaiting</span></p>
                                @if($data[8] != '0')
                                <a href="/admin/awaiting"><p class="task-hight-priority"><span>View Details</span></p></a>
                                @else
                                <p class="task-hight-priority"><span>No Pending!</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-3 col-sm-3 col-xxl-3">
        <div class="card">
            <div class="card-body">

                <div class="widget widget-five">
                    <div class="widget-content">

                        <div class="header">
                            <div class="header-body">
                                <h6>Recommendations</h6>
                            </div>
                        </div>

                        <div class="w-content">
                            <div class="">
                                <p class="task-left">{{$data[11]}}</p>
                                <p class="task-completed"><span>On Going</span></p>
                                @if($data[11] != '0')
                                <a href="/recommendations"><p class="task-hight-priority"><span>View Details</span></p></a>
                                @else
                                <p class="task-hight-priority"><span>No Pending!</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 col-md-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Incident Type - WPS</h5>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div id="apexcharts-column"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6 col-md-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Root Cause</h5>
            </div>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <td style="font-size: 12px;"><i class="fas fa-square-full text-primary"></i> People: {{$cause[0]}}</td>
                        <td style="font-size: 12px;"><i class="fas fa-square-full text-warning"></i> Process & Procedure: {{$cause[1]}}</td>
                        <td style="font-size: 12px;"><i class="fas fa-square-full text-danger"></i> Equipment: {{$cause[2]}}</td>
                        <td style="font-size: 12px;"><i class="fas fa-square-full text-dark"></i> Workplace: {{$cause[3]}}</td>
                    </tr>
                </thead>
            </table>
            <div class="card-body">
                <div class="chart">
                    <canvas id="chartjs-pie"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(auth()->user()->role == 'user' || auth()->user()->role == 'site_member')
<div class="row">
    <div class="col-3 col-sm-3 col-xxl-3">
        <div class="card">
            <div class="card-body">

                <div class="widget widget-five">
                    <div class="widget-content">

                        <div class="header">
                            <div class="header-body">
                                <h6>Notifications</h6>
                            </div>
                        </div>

                        <div class="w-content">
                            <div class="">
                                <p class="task-left">{{$data[10]}}</p>
                                <p class="task-completed"><span>Awaiting</span></p>
                                @if($data[8] != '0')
                                <a href="/awaiting"><p class="task-hight-priority"><span>View Details</span></p></a>
                                @else
                                <p class="task-hight-priority"><span>No Pending!</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-3 col-sm-3 col-xxl-3">
        <div class="card">
            <div class="card-body">

                <div class="widget widget-five">
                    <div class="widget-content">

                        <div class="header">
                            <div class="header-body">
                                <h6>Recommendations</h6>
                            </div>
                        </div>

                        <div class="w-content">
                            <div class="">
                                <p class="task-left">{{$data[12]}}</p>
                                <p class="task-completed"><span>On Going</span></p>
                                @if($data[12] != '0')
                                <a href="/recommendations"><p class="task-hight-priority"><span>View Details</span></p></a>
                                @else
                                <p class="task-hight-priority"><span>No Pending!</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endif


@include('charts.incidents')
@endsection


