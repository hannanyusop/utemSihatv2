<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.index') }}">
            <img src="{{ asset('img/system/logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('frontend.index') }}">
                            <img src="{{ asset('img/system/logo.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav mr-auto">
                @guest
                    <li class="nav-item">
                        <a href="{{route('frontend.auth.login')}}" class="nav-link">
                            <span class="nav-link-inner--text">@lang('navs.frontend.login')</span>
                        </a>
                    </li>
                    @if(config('access.registration'))
                        <li class="nav-item">
                            <a href="{{route('frontend.auth.register')}}" class="nav-link">
                                <span class="nav-link-inner--text">@lang('navs.frontend.register')</span>
                            </a>
                        </li>
                    @endif
                @else
                    @can('view backend')
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <span class="nav-link-inner--text">Admin Dashboard ({{ $logged_in_user->name }})</span>
                            </a>
                        </li>
                    @endcan
                        <li class="nav-item">
                            <a href="{{ route('frontend.auth.logout') }}" class="nav-link">
                                <span class="nav-link-inner--text">@lang('navs.general.logout')</span>
                            </a>
                        </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a href="{{route('frontend.user.dashboard')}}" class="nav-link">
                            <span class="nav-link-inner--text">@lang('navs.frontend.dashboard')</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
