@extends('frontend.user.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                    </div>
                    <div class="col-lg-6 col-5 text-right">
                    </div>
                </div>
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

        @if($alert)
            <div class="card bg-gradient-danger mt-2 mb-2">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <b class="text-secondary">Health Remainder</b>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('frontend.user.report.index') }}" class="badge badge-lg badge-success">View Report</a>
                        </div>
                    </div>
                    <div class="my-1">
                        <div class="h3 text-white">Becareful! You've taken to much calories in this week! </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="h3 mb-0">Hi! <?= $logged_in_user->fullname ?></h5>
                    </div>
                    <div class="card bg-gradient-default">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Today Calories</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">{{ $todayCal }}/{{ $calNeed }} KCAL</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                        <i class="fa fa-hamburger"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-white mr-2"><i class="fa fa-drumstick-bite"></i> {{ $used }}%</span>
                                <span class="text-nowrap text-light">Calorie Taken </span>
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row shortcuts px-4">
                            <a href="{{ route('frontend.user.meal.today') }}" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                  <i class="fa fa-utensils"></i>
                                </span>
                                <small>Today Meal</small>
                            </a>
                            <a href="{{ route('frontend.user.food.index') }}" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                  <i class="fa fa-cookie"></i>
                                </span>
                                <small>Food List</small>
                            </a>
                            <a href="{{ route('frontend.user.report.index') }}" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                  <i class="ni ni-books"></i>
                                </span>
                                <small>Reports</small>
                            </a>
                            <a href="{{ route('frontend.user.report.index') }}" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                  <i class="fa fa-trophy"></i>
                                </span>
                                <small>Records</small>
                            </a>
                            @can('view-backend')
                                <a href="#!" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                  <i class="fa fa-exchange-alt"></i>
                                </span>
                                    <small>Admin</small>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
