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
    <link rel="icon" type="image/png" sizes="16x16" href="{{   ('/images/favicon.png') }}">
    <title>@yield('htmlheader_title', 'Your title here') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{   ('/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{   ('/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{   ('/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- page css -->
    <link href="{{   ('/css/pages/floating-label.css') }}" rel="stylesheet">
    <link href="{{   ('/css/pages/file-upload.css') }}" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{   ('/css/style.css') }}" rel="stylesheet">
    
    <!-- You can change the theme colors from here -->
    <link href="{{   ('/css/colors/default-dark.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.max  .com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.max  .com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('style_additional')
</head>