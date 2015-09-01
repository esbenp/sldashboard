@extends('layout.configuration')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('configuration.menu', ['page' => 'gitHub'])
        </div>
        <div class="col-md-8">
            <span class="lead">{{_('GitHub setup')}}</span><br />
            <br />
            @if(gitHelper::isConnected('gitHub'))
                {!! _('Status: <span class="label label-success">Connected</span>') !!}
            @else
                {!! _('Status: <span class="label label-danger">Not connected</span>') !!}<br />
                <br />
                <a href="?connect=true" class="btn btn-success">
                    <span class="fa fa-github"></span>&nbsp; {{_('Click here to connect to GitHub')}}
                </a>
            @endif
            <br />

        </div>
    </div>
@endsection