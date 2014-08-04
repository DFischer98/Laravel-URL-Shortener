@extends('_master')

@section('navbar')

	<li id = 'current_page'><a href='/'><span class = 'underline'>Home</span></a></li>

	<li><a href='/stats'><span class = 'underline'>Stats</span></a></li>

	@if(Auth::check())
		<li><a href='/my-account'><span class = 'underline'>My Account</span></a></li>
		
		<li><a href='/logout'><span class = 'underline'>Log out</span></a></li>
					
	@else 	
		
		<li><a href='/signup'><span class = 'underline'>Sign up</span></a></li>

		<li><a href='/login'><span class = 'underline'>Log in</span></a></li>
	@endif	

@stop

@section('content')
	<h1>URL Shortener</h1>
	<br>
	<div class = 'form'>
	{{ Form::open(array('url' => '/generate')) }}

		{{ Form::label('URL', 'Enter URL to shorten') }}
		{{ Form::text('URL', null, array('placeholder'=>'Enter URL to shorten'))}}

		{{ Form::submit('Shorten!') }}
	{{ Form::close() }}


	@if(!Auth::check())
		<p class = 'unique_warning'>Warning: you are not signed in. Guests are not guaranteed to recieve unique redirects. If you plan on tracking statistics for your redirects, please log in to ensure your redirect is unique.</p>
	@endif
	</div>
@stop