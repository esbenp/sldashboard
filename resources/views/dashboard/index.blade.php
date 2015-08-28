@extends('layout.dashboard')

@section('content')

    <div class="row">
        <div class="col-md-9">
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
        <div class="col-md-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <span class="lead">Latest Commits</span>
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

            <div class="panel panel-default">
                <div class="panel-body">
                    <span class="lead">Andet tis</span>
                </div>
                <div class="panel-footer">
                    <i class="fa fa-home"></i> Panel footer
                </div>
            </div>
        </div>
    </div>

@stop