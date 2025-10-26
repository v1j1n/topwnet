<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title', config('app.name') . ' | Global Digital Solutions & Connectivity | Kuwait')</title>

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary Meta Tags -->
    <meta name="description" content="@yield('description', 'Top World Networks is a premier global digital agency. We provide worldwide web development, SEO, and digital marketing solutions to connect your brand across continents.')">
    <meta name="keywords" content="@yield('keywords', 'top world networks, global digital agency, worldwide web development, international SEO, digital marketing agency, global connectivity solutions, multinational web design')">

    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'Top World Networks | Your Global Digital Partner')">
    <meta property="og:description" content="@yield('og_description', 'Connecting brands worldwide with cutting-edge digital solutions, web development, and international SEO strategies.')">
    <meta property="og:type" content="website">

    @stack('styles')
</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Header -->
        @include('partials.header')

        <!-- Main Content -->
        @yield('content')

        <!-- Footer -->
        @include('partials.footer')
    </div>
    <!-- End Page Wrapper -->

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/slick-animation.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/mixitup.js') }}"></script>
    <script src="{{ asset('js/flatpickr.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/gsap.min.js') }}"></script>
    <script src="{{ asset('js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('js/SplitText.min.js') }}"></script>
    <script src="{{ asset('js/nice-select.min.js') }}"></script>
    <script src="{{ asset('js/knob.js') }}"></script>
    <script src="{{ asset('js/parallax.js') }}"></script>
    <script src="{{ asset('js/vanilla-tilt.js') }}"></script>
    <script src="{{ asset('js/splitting.js') }}"></script>
    <script src="{{ asset('js/splitType.js') }}"></script>
    <script src="{{ asset('js/script-gsap.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @stack('scripts')
</body>

</html>

