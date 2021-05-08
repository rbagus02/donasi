<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Donasi Buku</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{asset('guest/assets/img/favicon.png')}}" rel="icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="{{asset('guest/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('guest/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('guest/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('guest/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('guest/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('guest/assets/vendor/aos/aos.css')}}" rel="stylesheet">

    <link href="{{asset('guest/assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

    <!-- Header -->
    @include('guest.template.header')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('guest.template.footer')

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <div id="preloader"></div>


    <script src="{{asset('guest/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('guest/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('guest/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('guest/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('guest/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('guest/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('guest/assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('guest/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('guest/assets/js/main.js')}}"></script>

</body>

</html>