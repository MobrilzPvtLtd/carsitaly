<div id="loader" class="load-full-screen">
    <div class="loading-animation">
        <span><i class="fa fa-plane"></i></span>
        <span><i class="fa fa-bed"></i></span>
        <span><i class="fa fa-ship"></i></span>
        <span><i class="fa fa-suitcase"></i></span>
    </div>
</div>

<!-- BEGIN: SITE-WRAPPER -->
<div class="site-wrapper">
    <div class="row transparent-menu-top">
        <div class="container clear-padding">
            <div class="navbar-contact">
                <div class="col-md-7 col-sm-6 clear-padding">
                    <a href="#" class="transition-effect"><i class="fa fa-phone"></i> (+91) 1234567890</a>
                    <a href="www.gmail.com" class="transition-effect"><i class="fa fa-envelope-o"></i>
                        support@email.com</a>
                </div>
                <div class="col-md-5 col-sm-6 clear-padding search-box">
                    <div class="col-md-6 col-xs-5 clear-padding">
                        <form>
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" required placeholder="Search">
                                <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-xs-7 clear-padding user-logged">
                        @if (Auth::check())
                            <a @if(Auth::user()->hasRole('user')) href="#" @else href="{{ route('backend.dashboard') }}" @endif class="transition-effect">
                                <img class="avatar-img" src="{{ asset(Auth::user()->avatar) }}"
                                    alt="{{ asset(Auth::user()->name) }}">
                                Hello ,{{ Auth::user()->name }}
                            </a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>&nbsp;@lang('Logout')
                            </a>
                            <form id="logout-form" style="display: none;" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="transition-effect">
                                <i class="fa fa-sign-in"></i>Login
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row transparent-menu">
        <div class="container clear-padding">
            <!-- BEGIN: HEADER -->
            <div class="navbar-wrapper">
                <div class="navbar navbar-default" role="navigation">
                    <!-- BEGIN: NAV-CONTAINER -->
                    <div class="nav-container">
                        <div class="navbar-header">
                            <!-- BEGIN: TOGGLE BUTTON (RESPONSIVE)-->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!-- BEGIN: LOGO -->
                            <a href="{{ route('home') }}">
                                <img class="sidebar-brand-full" src="{{ asset('img/logo-admin.png') }}" alt="{{ app_name() }}" width="100px">
                                {{-- Car Italy and tours --}}
                            </a>
                        </div>

                        <!-- BEGIN: NAVIGATION -->
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                <li><a href="{{ route('home') }}"> HOME</a></li>
                                <li><a href="{{ route('frontend.cars.index') }}"> TRANSFERS</a></li>
                                <li><a href="{{ route('frontend.hotels.index') }}"> HOTELS</a></li>
                                <li><a href="{{ route('frontend.villas.index') }}"> VILLAS</a></li>
                                <li><a href="{{ route('frontend.tours.index') }}"> TOURS</a></li>
                                <li><a href="{{ route('frontend.cruises.index') }}"> CRUISE</a></li>
                                <li><a href="{{ route('contact') }}"> CONTACT</a></li>
                                </li>
                            </ul>
                        </div>
                        <!-- END: NAVIGATION -->
                    </div>
                    <!--END: NAV-CONTAINER -->
                </div>
            </div>
            <!-- END: HEADER -->
        </div>
    </div>
