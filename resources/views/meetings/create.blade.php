@extends('template')

@section('title', 'Create Meeting')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="/meeting">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="end_time">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="end_time">description</label>
                    <textarea class="form-control" name="description" placeholder="Add an awesome description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="start_time">Starting time</label>
                    <div class='input-group date' id='start_time'>
                        <input type='text' class="form-control" name="start_date" placeholder="Starting date and time">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="end_time">Ending time</label>
                    <div class='input-group date' id='end_time'>
                        <input type='text' class="form-control" name="end_date" placeholder="Ending date and time">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <script type="text/javascript">
                $(function () {
                    $('#start_time').datetimepicker();
                    $('#end_time').datetimepicker();
                });
                </script>
            </form>
        </div>
    </div>
</div>
@stop
