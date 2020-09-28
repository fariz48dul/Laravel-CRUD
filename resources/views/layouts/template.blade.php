<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>


    @stack('before-css')
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">

    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css')}}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/brands.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/conflict-detection.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/regular.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/solid.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/svg-with-js.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/v4-shims.css')}}"> -->

    <!-- CSS Libraries -->
    @stack('page-css')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
    @stack('after-css')

</head>

<body>
    <div id="app">
        <div class="main-wrapper">

            <!-- Main Content -->
            <div class="main-content pl-0 pr-0">
                <div class="container">
                    @yield('content')
                </div>
            </div>

            @include('layouts.footer')

        </div> <!-- ./main-wrapper -->
    </div> <!-- #/app  -->

    @stack('before-script')
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('assets/js/moment.min.js')}}"></script>
    <script src="{{ asset('assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    @stack('page-script')

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>

    <!-- Page Specific JS File -->
    @stack('after-script')
</body>

</html>
