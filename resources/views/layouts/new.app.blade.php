<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-idle-after="{{ config('session.lifetime') }}">

<!-- HEAD -->
@include('layouts.partials.htmlheader')

<body class="fix-header fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">{{ config('app.name', 'Laravel') }}</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @if (auth()->user() instanceof \App\Models\Persona)
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            @include('layouts.partials.topbar_header')

            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            @include('layouts.partials.left_sidebar')            
        @endif

        @if (auth()->user() instanceof \App\Models\Usuario)
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            @include('layouts.partials.admin.topbar_header')

            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            @include('layouts.partials.admin.left_sidebar')
        @endif

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">@yield('content_title', 'Content title')</h3>
                </div>
                <div class="col-md-7 align-self-center" style="display: none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item active">Form float input</li>
                    </ol>
                </div>
                <div class="" style="display: none">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            @yield('content')

            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            @include('layouts.partials.right_sidebar')

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('layouts.partials.footer')
        </div>
    </div>

    <div id="idle-timeout-dialog" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Your session is expiring soon')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>
                        <i class="fa fa-warning font-red"></i> {{__('You session will be locked in')}}
                        <span id="idle-timeout-counter"></span> {{__('seconds.')}}</p>
                    <p> {{__('Do you want to continue your session?')}} </p>
                </div>
                <div class="modal-footer text-center">
                    <button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-outline-info" data-dismiss="modal">{{__('Yes, Keep Working')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPTJS -->

    @include('layouts.partials.htmlscripts')

    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>        

    @yield('scripts')
    
</body>
</html>
