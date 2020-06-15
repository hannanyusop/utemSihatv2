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
                {{ html()->modelForm($user)->method('POST')->open() }}
                <form>
                    <!-- Input groups with icon -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    {{ html()->text('first_name')->class('form-control')->placeholder('First Name') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    {{ html()->text('last_name')->class('form-control')->placeholder('Last Name') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    {{ html()->email('email')->class('form-control') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <div class="custom-control custom-radio mb-3">
                                    {{ html()->radio('gender')->class('custom-control-input')->value('M')->checked(($user->gender == "M")? "true" : "false") }}
                                    <label class="custom-control-label" for="customRadio1">Male</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    {{ html()->radio('gender')->class('custom-control-input')->value('F')->checked(($user->gender == "F")? "true" : "false") }}
                                    <label class="custom-control-label" for="customRadio2">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Age</label>
                                <div class="input-group input-group-merge">
                                    {{ html()->number('age')->class('form-control') }}
                                    <div class="input-group-append">
                                        <span class="input-group-text">Years Old</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Height</label>
                                <div class="input-group input-group-merge">
                                    {{ html()->text('height')->class('form-control') }}
                                    <div class="input-group-append">
                                        <span class="input-group-text">CM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Weight</label>
                                <div class="input-group input-group-merge">
                                    {{ html()->number('weight')->class('form-control') }}
                                    <div class="input-group-append">
                                        <span class="input-group-text">KG</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info" value="Update Profile">
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>


@endsection
@push('after-scripts')
@endpush
