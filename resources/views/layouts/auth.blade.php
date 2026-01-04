<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" c>
    <title>Rental</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('back/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('back/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('back/assets/images/favicon.png') }}" />
</head>

<body>
    {{ $slot }}

    <!-- plugins:js -->
    <script src="{{ asset('back/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('back/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('back/assets/js/misc.js') }}"></script>
    <script src="{{ asset('back/assets/js/settings.js') }}"></script>
    <script src="{{ asset('back/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('back/assets/js/jquery.cookie.js') }}"></script>
</body>

</html>
