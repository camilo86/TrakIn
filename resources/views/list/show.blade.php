@extends('template')

@section('title', 'List')

@section('content')
    @include('objects.user_navbar')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/list">Lists</a></li>
            <li class="active">{{ $list->name }}</li>
        </ol>
        <div class="jumbotron" style="background-color:#1abc9c; color:white;">
            <center>
                <h1>{{ $list->name }}</h1>
                <p>{{ $list->description }} - <a href="/list/{{ $list->id }}/edit" style="color:black;">Edit</a></p>
            </center>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('objects.full_list_table')
            </div>
        </div>
    </div>
@stop
