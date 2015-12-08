@extends('template')

@section('title', 'Lists')

@section('content')
@include('objects.user_navbar')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".create-list-modal">New List</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">List Creation Tool</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            @include('objects.full_list_table')
        </div>
    </div>
</div>

<div class="modal fade create-list-modal" id="create-list-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create List</h4>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="end_time">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="List Name" required>
                    </div>
                    <div class="form-group">
                        <label for="end_time">description</label>
                        <textarea class="form-control" name="description" placeholder="Your awesome description here" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
