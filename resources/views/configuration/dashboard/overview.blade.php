@extends('layout.configuration')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('configuration.menu', ['page' => 'dashboard'])
        </div>
        <div class="col-md-8">
            <span class="lead">{{_('Dashboard setup')}}</span><br />
            <br />
            @foreach($positions as $position)
                <div class="panel panel-default">
                    <div class="panel-heading colored">
                        <div class="pull-left">
                            {!! sprintf(_('Position: <strong>%s</strong>'), strtoupper($position->name)) !!}
                        </div>

                        <div class="pull-right">
                            <button onclick="box.add('{{$position->id}}')" type="button" class="btn btn-link btn-xs">
                                <span class="fa fa-plus"></span>
                            </button>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                        @foreach($position->boxes() as $box)
                            {? $type = $box->type() ?}
                            <li class="list-group-item">
                                <div>
                                    @if(!empty($type->icon))
                                        <span class="fa fa-{{$type->icon}}"></span>&nbsp;&nbsp;
                                    @endif

                                    <strong>{{$type->title}}</strong>

                                    <a href="?remove={{$box->id}}" class="pull-right">
                                        <span class="fa fa-remove"></span>
                                    </a>
                                </div>
                                <code><small>{{$box->data}}</small></code>
                            </li>
                        @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- New box -->
    <div class="modal fade" id="addBox" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{_('Add new box')}}</h4>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        @foreach($types as $type)
                            <a href="#" onclick="box.select('{{$type->id}}')" class="list-group-item">
                                @if(!empty($type->icon))
                                    <span class="fa fa-{{$type->icon}}"></span>&nbsp;&nbsp;
                                @endif

                                <strong>{{$type->title}}</strong>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script.footer')
    <script type="text/javascript" src="{{URL::to('js/box.js')}}"></script>
@endsection