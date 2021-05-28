<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sports</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="{{ asset("/assets/front/css/animate.css") }}" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="{{ asset("/assets/front/css/style.default.css") }}" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="{{ asset("/assets/front/css/custom.css") }}" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="{{ asset("/assets/front/img/favicon.ico")}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset("/assets/front/img/apple-touch-icon.png") }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset("/assets/front/img/apple-touch-icon-57x57.png") }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset("/assets/front/img/apple-touch-icon-72x72.png") }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("/assets/front/img/apple-touch-icon-76x76.png") }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset("/assets/front/img/apple-touch-icon-114x114.png") }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset("/assets/front/img/apple-touch-icon-120x120.png") }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset("/assets/front/img/apple-touch-icon-144x144.png") }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset("/assets/front/img/apple-touch-icon-152x152.png") }}" />
    <!-- owl carousel css -->

    <link href="{{ asset("/assets/front/css/owl.carousel.css")}}" rel="stylesheet">
    <link href="{{ asset("/assets/front/css/owl.theme.css")}}" rel="stylesheet">

    @yield('css')

</head>

<body>

    <div id="all">

    @include('user.header')

    @yield('content')

    @include('user.footer')

    </div>
    <!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="{{ url("/assets/front/js/jquery.cookie.js") }}"></script>
    <script src="{{ url("/assets/front/js/waypoints.min.js") }}"></script>
    <script src="{{ url("/assets/front/js/jquery.counterup.min.js") }}"></script>
    <script src="{{ url("/assets/front/js/jquery.parallax-1.1.3.js") }}"></script>
    <script src="{{ url("/assets/front/js/front.js") }}"></script>
    <!-- jQuery -->
    <script src="{{ url("/assets/backend/vendors/jquery/dist/jquery.min.js") }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url("/assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js") }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ url("/assets/backend/build/js/custom.min.js") }}"></script>
    <script src="{{ url("/assets/backend/build/js/routes.js") }}"></script>
    @yield('javascript')
</body>

</html>