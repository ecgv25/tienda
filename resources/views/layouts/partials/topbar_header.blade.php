<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">
                <!-- Logo icon -->
                <b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ cdn('/images/logo-sunacrip.png') }}" alt="Inicio" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span>
                    <!-- dark Logo text -->
                    <img src="{{ cdn('/images/text-sunacrip.png') }}" alt="Inicio" />
                </span>
            </a>
        </div>
        
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item hidden-sm-down"></li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">

                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (is_null(auth()->user()->foto))
                        <i class="fas fa-user-circle fa-2x"></i>
                        @else
                        <img src="{{ cdn('/images/persons/fotos/'.auth()->user()->foto) }}" alt="user" class="profile-pic" />
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        @if (is_null(auth()->user()->foto))
                                        <i class="fas fa-user-circle fa-5x"></i>
                                        @else
                                        <img src="{{ cdn('/images/persons/fotos/'.auth()->user()->foto) }}" alt="Persona" />
                                        @endif
                                    </div>
                                    <div class="u-text">
                                        <h4 class="text-capitalize">{{ auth()->user()->nombre_completo }}</h4>
                                        <p class="text-muted">{{ auth()->user()->correo }}</p>
                                        <a href="{{ route('persona.reset') }}" class="btn btn-rounded btn-danger btn-sm">{{ __('Change Password') }}</a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>
                                    {{ __('Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>