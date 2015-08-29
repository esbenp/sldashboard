@extends('layout.installation')

@section('content')
    <span class="lead">{{_('User information')}}</span><br />
    <br />

    @include('installation.progress', ['progress' => 50])

    <form action="" method="post">
        {!! csrf_field() !!}

        <label for="inputEmail">{{_('Email:')}}</label>
        <input type="text" id="inputEmail" name="email" class="form-control" value="{{{$data['email'] or ''}}}" placeholder="{{_('admin@spotonlive.dk')}}" /><br />

        <label for="inputPassword">{{_('Password:')}}</label>
        <input type="password" id="inputPassword" name="password" class="form-control" /><br />

        <button type="submit" name="submit" class="btn btn-primary btn-block">{{_('Next')}}</button>
    </form>
@endsection