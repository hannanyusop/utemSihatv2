<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'UTeM Sihat')">
    <meta name="author" content="@yield('meta_author', 'Hannan Yusop')">
    @yield('meta')

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    @stack('before-styles')
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}" type="text/css">
    @stack('after-styles')
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="container">
        <div class="logo">
            <a href="{{ route('frontend.index') }}">
                <img src="{{ asset('landing/img/logo.png') }}" alt="">
            </a>
        </div>
        <div class="nav-menu">
            <nav class="mainmenu mobile-menu">
                <ul>
                    @guest
                        <li><a href="{{route('frontend.auth.login')}}">@lang('navs.frontend.login')</a></li>
                        @if(config('access.registration'))
                            <li><a href="{{route('frontend.auth.register')}}">@lang('navs.frontend.register')</a></li>
                        @endif
                    @else
                        @can('view backend')
                            <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard ({{ $logged_in_user->name }})</a></li>
                        @endcan
                            <li><a href="{{ route('frontend.auth.logout') }}">Logout</a></li>
                    @endguest
                    @auth
                            <li><a href="{{route('frontend.user.dashboard')}}">Dashborad</a></li>
                    @endauth
                </ul>
            </nav>
            <div class="nav-right search-switch">
                <i class="ti-search"></i>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->

@yield('content')

<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="register">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="{{ asset('landing/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('landing/js/mixitup.min.js') }}"></script>
<script src="{{ asset('landing/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('landing/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('landing/js/main.js') }}"></script>
@stack('after-scripts')

</body>

</html>
