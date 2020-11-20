<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>@yield('title') - GoodEdu</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('frontend/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('frontend/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('frontend/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('frontend/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet" media="all">
    @stack('css')
</head>

<body>
    @yield('content')

    <!-- Jquery JS-->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('frontend/js/global.js') }}"></script>
    @stack('js')
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->