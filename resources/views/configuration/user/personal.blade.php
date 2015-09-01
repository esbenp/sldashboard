@extends('layout.configuration')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('configuration.menu', ['page' => 'personal'])
        </div>
        <div class="col-md-8">
            <span class="lead">{{_('Personal settings')}}</span><br />
            <br />
            <form action="" method="post">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="name">{{_('What is your name?')}}</label>
                            <input type="text" name="user[name]" class="form-control" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="birthday">{{_('When is your birthday?')}} <span class="fa fa-birthday-cake"></span></label>
                            <input type="text" name="user[birthday]" class="form-control personal-settings__birthday" value="{{$user->birthday}}">
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">{{_('Save settings')}}</button>
            </form>
        </div>
    </div>
@endsection

@section('header.vendor.css')
    <link href="{{ URL::asset('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet">
@endsection

@section('script.footer')
    <script src="{{ URL::asset('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var input = $('.personal-settings__birthday');
            input.datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                orientation: 'bottom' // why are you not working
            });
        });
    </script>
@endsection
