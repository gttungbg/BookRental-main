<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('../adminLTE/dist/css/adminlte.min.css')}}">
    @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('partials.header')

@include('partials.siderbar')

@yield('content')
    @include('partials.footer')
</div>

<script src="{{asset('../adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('../adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../adminLTE/dist/js/adminlte.min.js')}}"></script>
@yield('js')
</body>
</html>
