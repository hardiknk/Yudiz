<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <!-- Fontawesome-css-link -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">

    <!-- Owl-Carosal-Style-link -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel') }}.min.css">

    <!-- Bootstrap-Style-link -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min') }}.css">

    <!-- Coustome-Style-link -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- Responsive-Style-link -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

</head>

<body>

    <div id="page_wrapper">
        @include('front.common.header')
        @yield('content')
        @include('front.common.footer')
    </div>
</body>
<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
@stack('extra-js')

</html>
