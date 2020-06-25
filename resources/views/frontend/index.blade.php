@extends('frontend.layouts.app-landing')


@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-item set-bg" data-setbg="{{ asset('landing/img/slider-bg-1.jpg') }}">
                <div class="container">
                    <div class="hero-text">
                        <h4>Elite Personal Training Services</h4>
                        <h1>Make it <span>Shape</span></h1>
                        <a href="{{ route('frontend.auth.register') }}" class="primary-btn">Join Us Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- About Page Trainer Section Begin -->
    <section class="about-page-trainer spad" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Food Calories Checker</h2>
                            <p>Our fitness experts can help you discover new training techniques.</p>
                            <input name="search" id="search" placeholder="Insert food name...." type="text" class="form-control form-control-lg col-md-4 offset-4">
                            <p class="mt-4" id="row"></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="data"></div>
        </div>
    </section>
    <!-- About Page Trainer Section End -->

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
