<ul class="nav nav-pills nav-stacked">
    <li role="presentation" @if($page == 'general') class="active" @endif>
        <a href="{{URL::to('configuration')}}">
            <span class="fa fa-cogs"></span>&nbsp; {{_('General')}}
        </a>
    </li>
    <li role="presentation" @if($page == 'personal') class="active" @endif>
        <a href="{{URL::to('configuration/personal')}}">
            <span class="fa fa-user"></span>&nbsp; {{_('Personal')}}
        </a>
    </li>
    <li role="presentation" @if($page == 'dashboard') class="active" @endif>
        <a href="{{URL::to('configuration/dashboard')}}">
            <span class="fa fa-dashboard"></span>&nbsp; {{_('Dashboard')}}
        </a>
    </li>
    <li role="presentation" @if($page == 'gitHub') class="active" @endif>
        <a href="{{URL::to('configuration/git/github')}}">
            <span class="fa fa-github"></span>&nbsp; {{_('GitHub')}}
        </a>
    </li>
    <li role="presentation">
        <a href="{{URL::to('dashboard')}}">
            <span class="fa fa-arrow-left"></span>&nbsp; {{_('Back to dashboard')}}
        </a>
    </li>
</ul>
