@extends('template')

@section('title', 'Meeting')

@section('content')
    @include('objects.user_navbar')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/meeting">Meetings</a></li>
            <li class="active">{{ $meeting->name }}</li>
        </ol>
        <div class="jumbotron" style="background-color:#1abc9c; color:white;">
            <center>
                <h1>{{ $meeting->name }}</h1>
                <p>{{ $meeting->description }} - <a href="/meeting/{{ $meeting->id }}/edit" style="color:black;">Edit</a></p>
                <a  style="color:white;" href="/logger/{{ $meeting->id }}">Go to meeting</a>
            </center>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Attendance</h3>
                @include('objects.attendance_table')
            </div>
        </div>
    </div>
@stop
