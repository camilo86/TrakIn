<!DOCTYPE html>
<html>
    <head>
        <title>TrakIn | @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/vendor/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/flat-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css') }}">
    </head>
    <body>
        @yield('content')
        <script src="{{ URL::asset('js/vendor/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/flat-ui.js') }}"></script>
    </body>
</html>
