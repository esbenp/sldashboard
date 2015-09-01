<!-- GitHub commits -->
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="lead">{{_('Server status')}}</span>
    </div>

    <div class="panel-body">
        {? $status = serverHelper::serverStatus($data->url); ?}
        @if($status['code'] <= 202 && !is_null($status['code']))
            <div class="label label-success">{{$status['code']}} - {{$status['description']}}</div>
        @else
            <div class="label label-danger">
                @if($status['code'])
                    {{$status['code']}} -
                @endif
                {{$status['description']}}</div>
        @endif
    </div>

    <div class="panel-footer clearfix">
        <div class="pull-left">
            <i class="fa fa-map-marker"></i> <span class="text-muted">{{$data->url}}</span>
        </div>
    </div>
</div>