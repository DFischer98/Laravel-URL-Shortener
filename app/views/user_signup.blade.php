@extends('_master')

@section('title')
	Sign up
@stop

@section('content')

	<h1>Sign up</h1>
	
	@foreach($errors->all() as $message) 
		<div class='error'>{{ $message }}</div>
	@endforeach
	
	{{ Form::open(array('url' => '/signup')) }}
				
		Email<br>
		{{ Form::text('email') }}<br><br>
	
		Password:<br>
		{{ Form::password('password') }}<br>
		<small>Min: 6</small><br><br>
		
		{{ Form::submit('Submit') }}
	
	{{ Form::close() }}

@stop
