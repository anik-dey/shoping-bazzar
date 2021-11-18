<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.frontend.css')

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
