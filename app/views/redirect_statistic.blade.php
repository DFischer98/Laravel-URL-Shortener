@extends('_master')

@section('content')

<h1 id = 'h1_info'>Redirect Information</h1>
<div class = 'card'>
	<h2>{{UrlHelper::getTitle($redirect_url)}}</h2>
	<h3><a href = '{{URL::to('/', $redirect_key)}}'>{{URL::to('/', $redirect_key)}}</a></h3>
	<p><a href = '{{$redirect_url}}'>{{str_limit($redirect_url, $limit = 50)}}</a></p>	
	<p>Hits: {{$hits}}</p>




</div>

@stop