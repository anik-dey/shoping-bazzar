<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin_components.admin_frontend.css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shoping | Bazzar</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ URL::to('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">>
</head>

<body id="bg" class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="page-loader"></div>
    <div class="pageWrapper">

        <!-- header -->
        @include('admin_components.admin_frontend.header')
        <!-- header END -->
        <!-- LeftcSide Bar -->
        @include('admin_components.admin_frontend.leftsidebar')
        <!-- Left Side Bar END-->
        <!-- Content -->
        {{-- @yield('content') --}}
        <!-- Content END-->

        <!-- Footer -->
        {{-- @include('admin_components.admin_frontend.footer') --}}
        <!-- Footer END-->
    </div>
    <!-- JAVASCRIPT FILES ========================================= -->
    @include('admin_components.admin_frontend.script')

</body>

</html>
