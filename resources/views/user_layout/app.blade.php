<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.frontend.css')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shoping-Bazzar &ndash; Online Shop</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body id="bg">
    <div class="page-loader"></div>
    <div class="pageWrapper">

        <!-- header -->
        @include('components.frontend.header')
        <!-- header END -->
        <!-- LeftcSide Bar -->
        @include('components.frontend.leftsidebar')
        <!-- Left Side Bar END-->
        <!-- Content -->
        @yield('content')
        <!-- Content END-->

        <!-- Footer -->
        @include('components.frontend.footer')
        <!-- Footer END-->
    </div>
    <!-- JAVASCRIPT FILES ========================================= -->
    @include('components.frontend.script')

</body>

</html>
