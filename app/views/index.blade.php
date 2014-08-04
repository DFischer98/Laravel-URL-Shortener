@extends('_master')

@section('navbar')

	@if(Auth::check())
		<li><a href'/my-account'><span class = 'underline'>My Account</span></a></li>
		
		<li><a href='/logout'><span class = 'underline'>Log out</span></a></li>
					
	@else 	
		
		<li><a href='/signup'><span class = 'underline'>Sign up</span></a></li>

		<li><a href='/login'><span class = 'underline'>Log in</span></a></li>
	@endif	

@stop

@section('content')
	<h1>URL Shortener</h1>
	<br>

	{{ Form::open(array('url' => '/generate')) }}

		{{ Form::label('URL', 'Enter URL to shorten') }}
		{{ Form::text('URL') }}

		{{ Form::submit('Shorten!') }}
	{{ Form::close() }}
@stop