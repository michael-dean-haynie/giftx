<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GiftX</title>

    <!-- jQuery Library -->
    <script src="{{asset('js/jquery-1.12.3.min.js')}}"></script>

    <!-- Bootstrap Library -->
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-3.3.6-dist/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap-3.3.6-dist/js/bootstrap.min.js')}}"></script>

    <!-- My Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/master.css')}}">
    @yield('to-master-css')
</head>
<body>
    @include('includes/master-nav')
    <div class="container-fluid master-container">
        @yield('to-master-content')
    </div>
    <!-- My Scripts -->
    <script src="{{asset('js/on-dropdown-click.js')}}"></script>
    <script src="{{asset('js/nested-clicks.js')}}"></script>
    <script src="{{asset('js/tap-to-click.js')}}"></script>
    @yield('to-master-js')
</body>
</html>