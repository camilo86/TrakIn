@extends('template')

@section('title', 'Login')

@section('content')
<div class="container container-table">
	<div class="row vertical-center-row">
        <div class="text-center col-md-4 col-md-offset-4">
        	<h1><strong>Login</strong></h1>
        	<form style="text-align:left;" method="POST" action="/login">
        		{!! csrf_field() !!}
  				<div class="form-group">
   		 			<label>Email address</label>
    				<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
  				</div>
  				<div class="form-group">
    				<label>Password</label>
    				<input type="password" class="form-control" name="password" placeholder="Password">
  				</div>
  				<button type="submit" class="btn btn-default">Submit</button>
			</form>
        </div>
    </div>
</div>
@stop
