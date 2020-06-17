@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <!-- Header -->
    <div class="header bg-default py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <div class="icon icon-shape bg-gradient-white shadow rounded-circle text-primary">
                            <i class="fa fa-burn text-primary"></i>
                        </div>
                        <h1 class="text-white">Choose the best plan for your business</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card bg-gradient-neutral">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Title -->
                    </div>
                    <!-- Card search -->
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
                                    <input id="search" name="search" type="search" class="form-control" placeholder="Search">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- List group -->
                        <div class="list-group list-group-flush">
                            <div id="data"></div>

                            <p id="row"></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script>
        $(document).ready(function(){

            fetchFood();

            function fetchFood(query = '')
            {
                $.ajax({
                    url:"{{ route('frontend.food-search') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#data').html(data.data);
                        $('#row').text(data.row);
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetchFood(query);
            });
        });
    </script>
@endpush
