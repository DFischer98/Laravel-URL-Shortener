@extends('_master')

@section('title')
	Sign up
@stop

@section('content')

	<h1>Sign up</h1>

	<div class = 'center'>
		
		@foreach($errors->all() as $message) 
			<div class='error'>{{ $message }}</div>
		@endforeach

		
		{{ Form::open(array('url' => '/signup')) }}
					
			Email<br>
			{{ Form::text('email', null, array('placeholder'=>'email@address.com')) }}<br><br>
		
			Password:<br>
			{{ Form::password('password') }}<br>
			<small>Min: 6</small><br><br>
			
			{{ Form::submit('Submit', ['class' => 'button', 'id' => 'user_form']) }}
		
		{{ Form::close() }}
	</div>
@stop
