<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/theme.css') }}" rel="stylesheet">
</head>
<body>

@yield('content')

<script src="{{ URL::asset('assets/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@yield('script.footer')
</body>
</html>
