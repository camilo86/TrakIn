@extends('template')

@section('title', 'Home')

@section('content')
@include('objects/user_navbar')
<div class="container">
    <div class="row">
        <div class="col-md-3">

            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".create-meeting-modal">New Meeting</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">View all Meetings</a></li>
                    <li><a href="#">Quick stats</a></li>
                    <li><a href="#">Meeting Creation Tool</a></li>
                </ul>
            </div>

            <div class="modal fade create-meeting-modal" tabindex="-1" role="dialog" aria-labelledby="New Meeting">
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
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Meeting</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <a href="#">
                        <tr href="http://google.com">
                            <td>Test Event</td>
                            <td>Stuff about this meeting goes here</td>
                        </tr>
                    </a>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('table tr').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
});
</script>
@stop
