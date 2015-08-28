@extends('layout.installation')

@section('content')
<!-- resources/views/auth/login.blade.php -->
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        {{_('Email')}}
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div>
        {{_('Password')}}
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> {{_('Remember me')}}
    </div>

    <div>
        <button type="submit" class="btn btn-primary pull-right">{{_('Login')}}</button>
    </div>
</form>
@endsection