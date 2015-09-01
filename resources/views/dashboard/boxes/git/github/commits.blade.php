<!-- GitHub commits -->
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="lead">{{_('Latest GitHub commits')}}</span>
    </div>

    <div class="panel-body">
        @if(gitHelper::isConnected('gitHub'))
            @foreach(gitHelper::commits('gitHub', $data->repository, $data) as $commit)
                {? $date = new \DateTime($commit['commit']['author']['date']) ?}
                <div class="row commit">
                    <div class="col-md-2 text-center">
                        <img class="img-circle img-thumbnail img-polaroid" alt="{{$commit['commit']['author']['email']}}" src="http://www.gravatar.com/avatar/{{md5($commit['commit']['author']['email'])}}">
                    </div>
                    <div class="col-md-10">
                        <b>{{$commit['commit']['author']['name']}}</b> {{$date->format(_('F j, Y H:i'))}}<br />
                        <span class="description dotdotdot">{{$commit['commit']['message']}}</span>
                    </div>
                </div>

                <hr />
            @endforeach
        @endif
    </div>

    <div class="panel-footer clearfix">
        @if(gitHelper::isConnected('gitHub'))
            <div class="pull-left">
                <i class="fa fa-github"></i> <span class="text-muted">{{$data->repository}}</span>
            </div>
        @else
            {!! sprintf(_('Please click <a href="%s">here</a> to connect to your Git account'), URL::to('configuration/git/github')) !!}
        @endif
    </div>
</div>