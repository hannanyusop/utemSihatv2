@extends('frontend.user.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <div class="col-lg-6 col-7">
                            @include('frontend.user.layouts.breadcumb')
                        </div>
                    </div>
                </div>
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

        <div class="card">
            <div class="card-header py-0">
                <!-- Search form -->
                <form>
                    <div class="form-group mb-0">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                            <input type="search" class="form-control" placeholder="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        @foreach($foods as $food)
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="#" class="avatar avatar-xl">
                                        <img alt="Image placeholder" src="{{ $food->image_url }}">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="#!">{{ $food->name }}</a>
                                    </h4>
                                    <small>{{ $food->calories }}g Cal/{{ $food->sugar }}g Sugar/{{ $food->protein }}g Protein/{{ $food->cholesterol  }}g Cholesterol</small>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-sm btn-primary">Add</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
