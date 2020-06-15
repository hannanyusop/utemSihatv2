@extends('frontend.user.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
<?php

    $title = 'TODAY MEAL';
    $links = [
        'title' => 'url'
    ];

?>
@section('content')
    <style type="text/css">
        .ui-autocomplete-input:focus {color:green;
            border:2px outset green;
        }
    </style>
    <!-- Page content -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        @include('frontend.user.layouts.breadcumb')
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-neutral">Add Meal</a>
                    </div>
                </div>
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <!-- Page content -->

    <div class="container-fluid mt--6">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <!-- Surtitle -->
                <h6 class="surtitle">Report</h6>
                <!-- Title -->
                <h5 class="h3 mb-0">Weekly</h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="chart">
                    <canvas id="report" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('after-scripts')
    <script>
        var MONTHS = @json($dates);
        var config = {
            type: 'line',
            data: {
                labels: @json($dates),
                datasets: [{
                    label: '',
                    data: @json($data),
                    fill: false,
                }
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Weekly Report'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Date'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Calorie'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('report').getContext('2d');
            window.myLine = new Chart(ctx, config);
        };

    </script>
@endpush
