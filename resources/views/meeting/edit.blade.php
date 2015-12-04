@extends('template')

@section('title', 'Edit' )

@section('content')
    @include('objects.user_navbar')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/meeting">Meetings</a></li>
            <li><a href="/meeting/{{ $meeting->id }}">{{ $meeting->name }}</a></li>
            <li class="active">Edit</li>
        </ol>
        <form method="POST" action="/meeting/{{ $meeting->id }}" accept-charset="UTF-8" id="edit_form">
            <input type="hidden" name="_method" value="PUT" />
            {!! csrf_field() !!}
            <div class="jumbotron" style="background-color:#1abc9c; color:white;">
                <center>
                    <h1>{{ $meeting->name }}</h1>
                </center>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="end_time">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $meeting->name }}">
                    </div>
                    <div class="form-group">
                        <label for="end_time">Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ $meeting->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="col-md-5">
                    <div class="btn-group btn-group-justified" role="group" style="margin-top:40px; margin-bottom:60px;">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-danger">delete</button>
                        </div>
                    </div>
                    <div class="share mrl">
                      <ul>
                        <li>
                          <label class="share-label" for="share-toggle2">Facebook</label>
                          <input type="checkbox" data-toggle="switch" />
                        </li>
                        <li>
                          <label class="share-label" for="share-toggle4">Twitter</label>
                          <input type="checkbox" checked="" data-toggle="switch" />
                        </li>
                        <li>
                          <label class="share-label" for="share-toggle6">Pinterest</label>
                          <input type="checkbox" data-toggle="switch" />
                        </li>
                      </ul>

                    </div> <!-- /share -->
                </div>
            </div>
        </form>
    </div>
@stop
