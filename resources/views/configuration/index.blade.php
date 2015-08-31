@extends('layout.configuration')

@section('content')
        <div class="row">
            <div class="col-md-4">
                @include('configuration.menu', ['page' => 'general'])
            </div>
            <div class="col-md-8">
                <span class="lead">{{_('Configuration')}}</span>
            </div>
        </div>
@endsection