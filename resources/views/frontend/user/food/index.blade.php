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
                            <input type="search"  id="search" class="form-control" placeholder="Search">
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
                        <p class="text-center" id="row"></p>
                        <div id="data">

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
                    url:"{{ route('frontend.user.food.serach') }}",
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
