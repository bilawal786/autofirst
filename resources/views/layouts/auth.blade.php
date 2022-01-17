<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Auto First</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/stylesheet.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/fullcalendar/dist/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/dashboard.css')}}" type="text/css">
</head>

<body class="bg-white">
<div class="main-content">
    @yield('content')
</div>

<script src="{{asset('backend/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>

<script src="{{asset('backend/assets/js/dashboard.js')}}"></script>

</body>
</html>
