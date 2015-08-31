<ul class="nav nav-pills nav-stacked">
    <li role="presentation">
        <a href="#">
            <span class="fa fa-cogs"></span>&nbsp; {{_('General')}}
        </a>
    </li>
    <li role="presentation">
        <a href="#">
            <span class="fa fa-dashboard"></span>&nbsp; {{_('Dashboard')}}
        </a>
    </li>
    <li role="presentation">
        <a href="#">
            <span class="fa fa-github"></span>&nbsp; {{_('GitHub')}}
        </a>
    </li>
    <li role="presentation">
        <a href="{{URL::to('dashboard ')}}">
            <span class="fa fa-arrow-left"></span>&nbsp; {{_('Back to dashboard')}}
        </a>
    </li>
</ul>