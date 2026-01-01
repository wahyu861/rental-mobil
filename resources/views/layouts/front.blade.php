<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>{{ config('app.name') }} - {{ $title }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/media/user/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/smoothScorllbar.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/classic.date.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/app.css') }}">
</head>

<body class="x-hidden">

    <!-- PRELOADER -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <!-- HEADER -->
    @include('partials.header')

    <!-- MAIN CONTENT -->
    <main>
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

    <button class="scrollToTopBtn">
        <i class="fa fa-arrow-up"></i>
    </button>

    <!-- Mobile Menu -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler">
                <i class="fa fa-times"></i>
            </span>

            <div class="logo-box">
                <img src="{{ asset('front/assets/media/user/logo.png') }}" alt="">
            </div>

            <div class="mobile-nav__container"></div>
        </div>
    </div>

    <!-- JS (URUTAN PENTING) -->
    <script src="{{ asset('front/assets/js/vendor/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/picker.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/picker.date.js') }}"></script>
    <script src="{{ asset('front/assets/js/date.js') }}"></script>
    <script src="{{ asset('front/assets/js/app.js') }}"></script>

</body>

</html>
