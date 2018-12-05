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
                <li> <a class="has-arrow waves-effect waves-dark" href="{{ route('home') }}"><i class="fa fa-link"></i>Inicio</a></li>
                <li> <a href="{{ route('productos_index') }}"><i class="fa fa-link"></i>Productos</a></li>
                <li> <a href="{{ route('inventario_index') }}"><i class="fa fa-link"></i>Inventario</a></li>
                <li> <a href="{{ route('ventas_index') }}"><i class="fa fa-link"></i>Ventas</a></li>
                <li> <a href="{{ route('obsequios_index') }}"><i class="fa fa-link"></i>Obsequios</a></li> 
                <li> <a href="{{ route('inventario_index') }}"><i class="fa fa-link"></i>Reportes</a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<script>
$(document).ready(function () {
$('#sidebartoggler').collapse('toggle');
})
</script>


<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">DOCUMENTATION</li>
                <li><a href="#Intro" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Introduction</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
                                        
                   