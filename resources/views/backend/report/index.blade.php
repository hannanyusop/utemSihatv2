@extends('backend.layouts.app')

@section('title', app_name() . ' | Food List')

@section('breadcrumb-links')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Traffic &amp; Sales</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <canvas id="all"></canvas>
                        </div>
                        <div class="col-md-7">
                            <canvas id="gender"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
    <script>
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };

        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: @json($data['all']),
                    backgroundColor: [
                        'rgb(11,71,226)',
                        'rgba(97,217,12,0.99)',
                        'rgb(255,216,133)',
                        'rgba(238,12,12,0.94)',

                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    'Under Weight',
                    'Normal',
                    'Overweight',
                    'Obese',
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'BMI Statistics Overall'
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('all').getContext('2d');
            window.myPie = new Chart(ctx, config);
        };

        var ctx = document.getElementById('gender').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Under Weight', 'Normal', 'Over Weight', 'Obes'],
                datasets: [{
                    label: 'MALE',
                    data: @json($data['male']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderWidth: 1
                },
                    {
                        label: 'FEMALE',
                        data: @json($data['female']),
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'BMI Statistics By Gender'
                }
            }
        });
    </script>
@endpush
