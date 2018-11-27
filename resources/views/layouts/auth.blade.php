<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="description" content="washiru">
    <meta name="author" content="washiru">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{  ('/images/favicon.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ ('/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- toast CSS -->
    <link href="{{  ('/plugins/toast-master/css/jquery.toast.css') }}" rel="stylesheet">

    <!-- page css -->
    <link href="{{  ('/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <link href="{{  ('/css/pages/floating-label.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{  ('/css/style.css') }}" rel="stylesheet">
    
    <!-- You can change the theme colors from here -->
    <link href="{{  ('/css/colors/default-dark.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.max .com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.max .com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
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
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{  ('/images/background/login-register-' . env('APP_ORG', 'laravel') . '.png') }});">
            <div class="login-box card">

                @yield('content')
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{  ('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{  ('/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{  ('/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{  ('/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <!--Menu sidebar -->
    <script src="{{  ('/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{  ('/plugins/jquery-mask/jquery.mask.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{  ('/js/custom.min.js') }}"></script>
    <script src="{{  ('/js/mask.init.js') }}"></script>
    
    @yield('script_additional')

    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(function() {
            $('.login-register').perfectScrollbar()
        });
    </script>
</body>
</html>