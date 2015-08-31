@extends('layout.dashboard')

@section('content')
    <!-- Topbar -->
    <nav class="navbar navbar-default top-bar">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="text">
                        <span>
                            <span class="fa fa-map-marker"></span>&nbsp; {{configHelper::getSiteName()}}
                        </span>
                    </li>
                    <li class="text">
                        <span>
                            <span class="fa fa-link"></span>&nbsp; {{configHelper::getSiteUrl()}}
                        </span>
                    </li>
                    <li class="text">
                        <span>
                            <span class="fa fa-clock-o"></span>&nbsp; <span class="server-time">00:00</span>
                        </span>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->email}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{URL::to('configuration')}}" title="{{_('Configure')}}">
                                    <span class="fa fa-cog"></span>&nbsp; {{_('Configure')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('auth/logout')}}" title="{{_('Log out')}}">
                                    <span class="fa fa-lock"></span>&nbsp; {{_('Log out')}}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- Topbar end -->

    <!-- Dashboard -->
    <div class="container-fluid dashboard">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="lead">Stats</span>
                    </div>
                    <div class="panel-body">
                        GRAPHS
                    </div>
                    <div class="panel-footer">Bla bla bla</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="lead">Stats</span>
                    </div>
                    <div class="panel-body">
                        GRAPHS
                    </div>
                    <div class="panel-footer">Bla bla bla</div>
                </div>
            </div>
            <div class="col-md-4">
                @if(isset($gitHub))
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <span class="lead">{{_('Latest Commits')}}</span>
                            <span class="label label-danger pull-right">Danger</span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2">
                                    IMG
                                </div>
                                <div class="col-md-10">
                                    <b>Mark Stoumann</b>
                                    <span class="show">Commit info... bla bla bla...</span>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-md-2">
                                    IMG
                                </div>
                                <div class="col-md-10">
                                    <b>Nikolaj Petersen</b>
                                    <span class="show">Commit info... bla bla bla...</span>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-md-2">
                                    IMG
                                </div>
                                <div class="col-md-10">
                                    <b>Mark Stoumann</b>
                                    <span class="show">Commit info... bla bla bla...</span>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="panel-footer clearfix">
                            <div class="pull-left">
                                <i class="fa fa-github"></i> <span class="text-muted">spotonlive/sldashboard</span>
                            </div>
                            <div class="pull-right">
                                <i class="fa fa-clock-o"></i> 28-08-15 13:43
                            </div>
                        </div>
                    </div>
                @else
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <span class="lead">{{_('Latest Commits')}}</span>
                        </div>
                        <div class="panel-body">
                            {!! sprintf(_('Please click <a href="%s">here</a> to connect to your Git account'), URL::to('configuration')) !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Dashboard end -->
@stop