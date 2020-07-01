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
                            <a  data-toggle="modal" data-target="#modal-default" class="col-4 shortcut-item">
                                <span class="shortcut-media avatar rounded-circle bg-gradient-blue">
                                  <i class="fa fa-share"></i>
                                </span>
                                <small>Invite Friend</small>
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

    <div class="col-md-6">
        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Invite friend</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <img alt="Image placeholder" src="https://www.manorsurgery.co.uk/media/content/images/healthimg.jpg" class="img-fluid rounded">
                                        <div class="row align-items-center my-3 pb-3">
                                            <div class="col-sm-12">
                                                <h2>Join Us and Set your target now!</h2>
                                                <p class="mt-2">
                                                    Personal profiles are the perfect way for you to grab their attention and persuade.
                                                </p>
                                                <div class="text-center mb-4">
                                                    OR SHARE THIS LINK
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input  id="link" type="text" class="form-control" value="{{ route('frontend.invite-friend') }}" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" id="copy" type="submit"><i class="fa fa-copy"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript">
        $("#copy").click(function(){

            var copyText = document.getElementById("link");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");

            Swal.fire({
                toast: true,
                icon: 'success',
                showConfirmButton: false,
                position: 'top-end',
                text: 'Url Copied!',
            })

        });
    </script>
@endpush
