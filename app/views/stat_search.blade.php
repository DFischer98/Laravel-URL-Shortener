@extends('_master')

@section('content')
	<h1>Redirect Statistics</h1>
	<p>Look up a redirect link to find more information.</p>
	<div class = 'form'>
		{{ Form::open(array('data' => '/stats')) }}

			{{ Form::text('link', null, array('placeholder'=>'Enter Redirect Link or Last 6 Characters'))}}

			{{ Form::submit('Search', ['class' => 'button', 'id' => 'text-form']) }}
		{{ Form::close() }}
	</div>
@stop