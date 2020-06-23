@extends('frontend.user.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
<?php

    $title = 'CHANGE PASSWORD';
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
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <!-- Surtitle -->
                <h6 class="surtitle">Account Setting</h6>
                <!-- Title -->
                <h5 class="h3 mb-0">Change Password</h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
                {{ html()->form('POST')->attribute('role', 'form')->open() }}
                <form>
                    <!-- Input groups with icon -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ html()->password('password')->placeholder('Old Password')->class('form-control') }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ html()->password('new_password')->placeholder('New Password')->class('form-control') }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ html()->password('new_password_confirmation')->placeholder('New Password Confirmation')->class('form-control') }}
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-warning float-right" value="Change Password">
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>


@endsection
@push('after-scripts')
    <script type="text/javascript">
        var $form = $("form"),
            $successMsg = $(".alert");
        $form.validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5,
                },
                new_password: {
                    required: true,
                    minlength: 7,
                },
                new_password_confirmation: {
                    required: true,
                    minlength: 7,
                    equalTo : '#new_password',
                },
            },
            messages: {

            },
            submitHandler: function() {
                form.submit();
            }
        });
    </script>
@endpush
