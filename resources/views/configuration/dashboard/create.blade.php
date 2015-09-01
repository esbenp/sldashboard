@extends('layout.configuration')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('configuration.menu', ['page' => 'dashboard'])
        </div>
        <div class="col-md-8">
            <span class="lead">{{sprintf(_('Create new %s box'), $type->title)}}</span><br />
            <br />
            <form action="" method="post">
                {!! csrf_field() !!}

                @foreach($type->formatAsObject() as $elementName => $element)
                    {!! formHelper::row($elementName, $element, ['id' => $elementName, 'class' => 'form-control']) !!}<br />
                @endforeach
                
                <button type="submit" name="submit" class="btn btn-primary">{{_('Submit box')}}</button>
            </form>
        </div>
    </div>
@endsection

@section('script.footer')
    <script type="text/javascript" src="{{URL::to('js/box.js')}}"></script>
@endsection