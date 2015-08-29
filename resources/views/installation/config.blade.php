@extends('layout.installation')

@section('content')
    <span class="lead">{{_('Website information')}}</span><br />
    <br />

    <form action="" method="post">
        {!! csrf_field() !!}

        <label for="inputTitle">{{_('Titel')}}</label>
        <input type="text" id="inputTitle" name="siteName" class="form-control" value="{{{$data['siteName'] or ''}}}" placeholder="{{_('Ex. SpotOn Live')}}" /><br />

        <label for="inputUrl">{{_('Hjemmeside url:')}}</label>
        <input type="text" id="inputUrl" name="siteUrl" class="form-control" value="{{{$data['siteUrl'] or ''}}}" placeholder="{{_('Ex. http://spotonlive.dk')}}" /><br />

        <label for="inputEmail">{{_('Admin e-mail:')}}</label>
        <input type="text" id="inputEmail" name="email" value="{{{$data['email'] or ''}}}" class="form-control" placeholder="{{_('Ex. admin@spotonlive.dk')}}" /><br />

        <button type="submit" name="submit" class="btn btn-primary btn-block">{{_('Next')}}</button>
    </form>
@endsection