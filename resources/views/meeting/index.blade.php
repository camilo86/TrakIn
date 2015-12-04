@extends('template')

@section('title', 'Meetings')

@section('content')
    @include('objects.user_navbar')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Meetings</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                @include('objects.full_meeting_table')
            </div>
        </div>
    </div>
@stop
