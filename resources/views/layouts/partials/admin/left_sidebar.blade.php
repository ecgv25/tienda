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
                <li><a href="{{ route('home') }}" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu"> Inicio</span></a></li>
                <li><a href="{{ route('productos_index') }}" aria-expanded="false"><i class="fab fa-product-hunt"></i><span class="hide-menu"> Productos</span></a></li>
                <li><a href="{{ route('inventario_index') }}" aria-expanded="false"><i class="fa fa-boxes"></i><span class="hide-menu"> Inventario</span></a></li>
                <li><a href="{{ route('ventas_index') }}" aria-expanded="false"><i class="fa fa-location-arrow"></i><span class="hide-menu"> Ventas</span></a></li>
                <li><a href="{{ route('obsequios_index') }}" aria-expanded="false"><i class="fa fa-gift"></i><span class="hide-menu"> Obsequios</span></a></li>
                <li><a href="#" aria-expanded="false"><i class="fa fa-file-alt"></i><span class="hide-menu"> Reportes</span></a></li>

              
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
