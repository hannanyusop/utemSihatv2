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
                        <div class="col-md-12">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-primary">
                                        <th class="">State</th>
                                        <th>Under Weight</th>
                                        <th>Normal</th>
                                        <th>Over Weight</th>
                                        <th>Obese</th>
                                    </tr>
                                    @foreach($data as $key => $item)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            @foreach($item as $i)
                                                <td>{{ $i }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
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
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Under Weight', 'Normal', 'Over Weight', 'Obese'],
                datasets: [
                    @foreach($data as $key => $item)
                    {
                    label: '{{ $key }}',
                    data: @json($item),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                },
                @endforeach
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endpush
