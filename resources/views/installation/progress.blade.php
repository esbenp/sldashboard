<strong>{{_('Progress:')}}</strong><br />

<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$progress}}%">
        {{sprintf(_('%s%% Complete'), $progress)}}
    </div>
</div>