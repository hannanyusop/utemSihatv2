@extends('frontend.user.layouts.app')

@section('title', app_name() . ' | Report' )
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
    <div class="header bg-primary">
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

    <div class="">
        <div class="row m-3">
            @if($meals->count() == 0)
                <div class="col-12">
                    <div class="card bg-gradient-gray-dark">
                        <div class="card-body">
                            <div class="mb-2">
                                <span class="text-white">Ops! No meals added for today.</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @foreach($meals as $meal)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="#!">{{ $meal->meal_type_alt }}</a>
                                    </h4>
                                    <p class="text-sm text-muted mb-0"><i class="fa fa-clock"></i> {{ $meal->time }}</p>
                                    <span class="text-success">●</span>
                                    <small>{{ $meal->ttl_calorie }} KCAL</small>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('frontend.user.meal.today-view', $meal->id) }}" class="btn btn-sm btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Meal
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ html()->form("POST")->action(route('frontend.user.meal.add-group'))->open() }}
                <div class="modal-body">
                    <div class="form-group">
                        <select name="meal_type" class="select2 form-control">
                            @foreach($mealsList as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Meal</button>
                </div>
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')

@endpush
