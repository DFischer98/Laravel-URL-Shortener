@extends('master')

@section('content')
	<h1>URL Shortener</h1>
	<br>

	{{ Form::open(array('url' => '/generate')) }}

		{{ Form::label('URL', 'Enter URL to shorten') }}
		{{ Form::text('URL') }}

		{{ Form::submit('Shorten!') }}
	{{ Form::close() }}
@stop