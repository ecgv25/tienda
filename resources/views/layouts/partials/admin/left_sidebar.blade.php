<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-profile">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>

                        <span class="hide-menu">
                            <span class="text-capitalize">{{ auth()->user()->nombre_completo }}</span>
                        </span>
                    </a>

                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void()">{{ __('My Profile') }}</a></li>
                        <li>
                            <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form-left').submit();">
                                {{ __('Logout') }}
                            </a>
                            
                            <form id="logout-form-left" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">MENÚ PRINCIPAL</li>
                @can('gestion_usuarios')
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu">Gestión de usuarios</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @can('habilidades')
                        <li><a href="{{ route('admin.habilidades.index') }}">Habilidades</a></li>
                        @endcan
                        @can('perfiles')
                        <li><a href="{{ route('admin.perfiles.index') }}">Perfiles</a></li>
                        @endcan
                        @can('usuarios')
                        <li><a href="{{ route('admin.usuario.index') }}">Usuarios</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('gestion_verificacion_identidad')
                <li>
                    <a class="waves-effect waves-dark" href="verificacion_identidad" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span class="hide-menu">
                            Verificacion de Identidad
                        </span>
                    </a>
                </li>
                @endcan
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.solicitud_licencias.index') }}" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span class="hide-menu">
                            Solicitudes de Licencia
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>