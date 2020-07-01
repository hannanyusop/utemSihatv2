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
    <div class="header bg-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        @include('frontend.user.layouts.breadcumb')
                    </div>
                </div>
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="m-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        {{ html()->form("POST")->action(route('frontend.user.meal.today-add-item', $meal->id))->open() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <select name="food_id" class="form-control" data-toggle="select">
                                    @foreach($foods as $food)
                                        <option value="{{ $food->id }}">{{ $food->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <select class="form-control" data-toggle="select">
                                <option>Alerts</option>
                                <option>Badges</option>
                                <option>Buttons</option>
                                <option>Cards</option>
                                <option>Forms</option>
                                <option>Modals</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('frontend.user.meal.today') }}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <div class="col mb-4">
                    <h3 class="mb-0">{{ $today }} Meal ({{ $meal->meal_type_alt }})</h3>
                </div>

                <div class="row">

                    @foreach($meal->foods as $item)
                    <div class="col-md-4">
                        <!-- Image-Text card -->
                        <div class="card">
                            <!-- Card image -->
                            <img class="card-img-top" src="{{ $item->food->image_url }}" alt="Image placeholder">
                            <!-- Card body -->
                            <div class="card-body">
                                <h5 class="h2 card-title mb-0">{{ $item->food->name }}</h5>
                                <p class="card-text mt-4">Desc :{{ $item->food->description }}<br>
                                    {{ $item->food->calorie }} KCAL
                                </p>
                                <div class="float-right">
                                    <a class="btn btn-sm btn-warning" onclick="return confirm('Are you sure want to remove this item?')" href="{{ route('frontend.user.meal.today-remove-item', [$meal->id, $item->id]) }}" >Remove</a>
                                </div>
                            </div>
                        </div>
                        <!-- Members list group card -->
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')

@endpush
