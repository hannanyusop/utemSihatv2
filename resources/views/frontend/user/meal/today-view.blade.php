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
                </div>
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">{{ $today }} Meal ({{ $meal->meal_type_alt }})</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('frontend.user.meal.today') }}" class="btn btn-sm btn-primary">Back</a>
                                <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-success">Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Food</th>
                                <th scope="col">Description</th>
                                <th scope="col">Calorie</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meal->foods as $item)
                                <tr>
                                <th scope="row">
                                    {{ $item->food->name }}
                                </th>
                                <td>{{ $item->food->description }}</td>
                                <td>{{ $item->food->calorie }} KCAL</td>
                                <td><a class="btn btn-sm btn-warning" onclick="return confirm('Are you sure want to remove this item?')" href="{{ route('frontend.user.meal.today-remove-item', [$meal->id, $item->id]) }}" >Remove</a> </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ html()->form("POST")->action(route('frontend.user.meal.today-add-item', $meal->id))->open() }}
                <div class="modal-body">
                    <div class="form-group">
                        <select name="food_id" class="select2 form-control">
                            @foreach($foods as $food)
                                <option value="{{ $food->id }}">{{ $food->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')

@endpush
