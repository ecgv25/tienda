<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav"><br>
            <ul id="sidebarnav">
                <li class="user-profile">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>

                        <span class="hide-menu">
                        </span>
                    </a>

                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void()">{{ __('My Profile') }}</a></li>
                        <li>
                            <a href="#" onclick="event.preventDefault();document.getElementById('logout-form-left').submit();">
                                {{ __('Logout') }}
                            </a>
                            
                            <form id="logout-form-left" action="#" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">MENÚ PRINCIPAL</li>
                <li> <a href="{{ route('home') }}">Inicio</a></li>
                <li> <a href="{{ route('productos_index') }}">Productos</a></li>
                <li> <a href="{{ route('inventario_index') }}">Inventario</a></li>
                <li> <a href="{{ route('ventas_index') }}">Ventas</a></li>
                <li> <a href="{{ route('obsequios_index') }}">Obsequios</a></li> 
                
                <li> <a href="{{ route('inventario_index') }}">Reportes</a></li>


               
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>