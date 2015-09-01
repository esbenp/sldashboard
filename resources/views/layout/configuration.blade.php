<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{_('Configuration')}}</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    @yield('header.vendor.css')

    <link href="{{ URL::asset('css/theme.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (isset($error))
                        <div class="alert alert-error">{{$error}}</div>
                    @endif
                    @if (isset($msg))
                        <div class="alert alert-success">{{$msg}}</div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('assets/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@yield('script.footer')
</body>
</html>
