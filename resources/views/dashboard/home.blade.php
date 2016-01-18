@extends('template')

@section('title', 'Home')

@section('content')
@include('objects/user_navbar')

<div class="container">
    @if(Auth::user()->group === "mentor")
    <div class="row">
        <div class="col-md-3">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".create-meeting-modal">New Meeting</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="/meeting">View all Meetings</a></li>
                    <li><a href="#">Quick stats</a></li>
                    <li><a href="/meeting/create">Meeting Creation Tool</a></li>
                </ul>
            </div>
            <div class="modal fade create-meeting-modal" tabindex="-1" role="dialog" aria-labelledby="New Meeting">
                <form method="POST" action="/meeting">
                    {!! csrf_field() !!}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">New Meeting</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label for="end_time">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="end_time">description</label>
                                                <textarea class="form-control" name="description" placeholder="Add an awesome description here" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="start_time">Starting time</label>
                                                <div class='input-group date' id='start_time'>
                                                    <input type='text' class="form-control" name="start_date" placeholder="Starting date and time" required>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="end_time">Ending time</label>
                                                <div class='input-group date' id='end_time'>
                                                    <input type='text' class="form-control" name="end_date" placeholder="Ending date and time" required>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                        $(function () {
                                            $('#start_time').datetimepicker();
                                            $('#end_time').datetimepicker();
                                        });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            @include('objects.meeting_table')
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <center>
            <h3>You have <b style="color:red">{{ Auth::user()->hours }}</b> hours total</h3>
            </center>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    @endif
</div>
@stop
