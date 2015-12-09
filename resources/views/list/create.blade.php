@extends('template')

@section('title', 'Create List')

@section('content')

@include('objects.user_navbar')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="/list">Lists</a></li>
                <li class="active">List Creation Tool</li>
            </ol>
        </div>
    </div>
</div>
<div class="container">
    <div class="jumbotron" style="background-color:#1abc9c; color:white;">
        <h1>List Creation Tool</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form method="POST" action="/list">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="end_time">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="end_time">description</label>
                    <textarea class="form-control" name="description" placeholder="Add an awesome description" rows="3" required></textarea>
                </div>
                <script>
                    $(function () {
                        $('#start_time').datetimepicker();
                        $('#end_time').datetimepicker();
                    });
                </script>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
@stop
