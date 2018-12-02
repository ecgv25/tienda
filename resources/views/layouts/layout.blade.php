<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-idle-after="{{ config('session.lifetime') }}">

<!-- HEAD -->
<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-combobox/css/bootstrap-combobox.css') }}">
	<script src="{{ asset('assets/bootstrap-combobox/js/bootstrap-combobox.js') }}"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
        
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            @include('layouts.partials.topbar_header')

            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            @include('layouts.partials.left_sidebar')            
       
      
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
      

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <br> <div class="container-fluid">
                
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
    <script type="text/javascript">
	$(function(){
		$('#costoDivisas, #ganancia').keyup(function(){
			var costoDivisa = parseFloat($('#costoDivisas').val());
			var porcentajeGanancia = parseFloat($('#ganancia').val());
			var valorPetroDolar = 60;

			if(isNaN(parseFloat(costoDivisa)) == false && isNaN(parseFloat(porcentajeGanancia)) == false) {
				var ganancia = (costoDivisa*(porcentajeGanancia/100));
				var totalCosto = costoDivisa + ganancia;
				var costoPetro = totalCosto / valorPetroDolar;

				$('#costoPetros').val(costoPetro.toFixed(8));
			}
		});
	});
	</script>      

    @yield('scripts')
    
</body>
</html>