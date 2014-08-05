@extends('_master')


@section('content')
	<h1>URL Shortener</h1>
	<br>
	<div class = 'form'>
	{{ Form::open(array('url' => '/generate')) }}

		{{ Form::text('URL', null, array('placeholder'=>'Enter URL to shorten'))}}

		{{ Form::submit('Shorten', ['class' => 'button']) }}
	{{ Form::close() }}


	@if(!Auth::check())
		<p class = 'unique_warning'>Reminder: you are not signed in. Guests are not guaranteed to recieve unique redirect links. If you plan on tracking statistics for your links, please log in to ensure your redirect is unique.</p>
	@endif
	</div>
@stop