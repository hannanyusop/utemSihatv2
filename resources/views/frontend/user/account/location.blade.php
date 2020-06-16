@extends('frontend.user.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
<?php

    $title = 'TODAY MEAL';
    $links = [
        'title' => 'url'
    ];

?>
@push('after-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.css" />
@endpush
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
                <h6 class="surtitle">Locate You!</h6>
                <!-- Title -->
                <h5 class="h3 mb-0">Location Tracker</h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
                {{ html()->form()->open() }}
                    <div>
                        <p>Last Location : {{ $old}}</p>
                        <h4>Your current location is:</h4>
                        <span class="text-info location"></span>
                    </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Longitude</label>
                            <div class="input-group input-group-merge">
                                {{ html()->text('lon')->class('form-control')->readonly() }}
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-location-arrow"></i> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Latitude</label>
                            <div class="input-group input-group-merge">
                                {{ html()->text('lat')->class('form-control')->readonly() }}
                                {{ html()->hidden('name') }}
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-location-arrow"></i> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Update Location</button>
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>


@endsection
@push('after-scripts')
     <script type="text/javascript">
         var $locationText = $('.location');

         // Check for geolocation browser support and execute success method
         if (navigator.geolocation) {
             navigator.geolocation.getCurrentPosition(geoLocationSuccess, geoLocationError, {timeout: 10000});
         }
         else {
             alert('your browser doesn\'t support geolocation');
         }
         function geoLocationSuccess(pos) {
             // get user lat,long
             var myLat = pos.coords.latitude,
                 myLng = pos.coords.longitude,
                 loadingTimeout;


             var loading = function() {
                 $locationText.text('fetching...');
             }

             loadingTimeout = setTimeout(loading, 600);

             var request = $.get( "https://nominatim.openstreetmap.org/reverse?format=json&lat="+myLat+"&lon=" + myLng)
                 .done(function(data) {
                     if (loadingTimeout) {
                         clearTimeout(loadingTimeout);
                         loadingTimeout = null;
                         $locationText.text(data.display_name);
                         $('#lat').val(data.lat);
                         $('#name').val(data.display_name);
                         $('#lon').val(data.lon);
                     }
                 })
                 .fail(function() {
                     // handle error
                 });
         };

         function geoLocationError(error){
             var errors = {
                 1: 'Permission denied',
                 2: 'Position unavailable',
                 3: 'Request timeout'
             };
             alert("Error: " + errors[error.code]);
         }
    </script>
@endpush
