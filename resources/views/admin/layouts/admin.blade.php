<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Multi-Store</title>
    <!-- Favicon -->
    <link rel="icon" href="/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="/assets/css/argon.css?v=1.2.0" type="text/css">
    <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    @stack('custom-css')
</head>
<body>
@auth()
    @include('admin.layouts.navbars.sidebar')
@endauth

<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin.layouts.navbars.navbar')

    <!-- Page content -->
    @yield('main-content')
</div>

@guest()
    @include('admin.layouts.footers.guest')
@endguest

<!-- Argon Scripts -->
<!-- Core -->

@include('admin.layouts.footers.script')
@stack('custom-script')
</body>

</html>
