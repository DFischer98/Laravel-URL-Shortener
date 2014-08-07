@extends('_master')

@section('content')

<h1 id = 'h1_info'>Your Redirect</h1>
<div class = 'card' id ='result'>
	<h2>{{UrlHelper::getTitle($redirect_url)}} - <a href = '{{URL::to('/', $redirect_key)}}'>{{URL::to('/', $redirect_key)}}</a></h2>
	<p><a href = '{{$redirect_url}}'>{{str_limit($redirect_url, $limit = 50)}}</a></p>	
</div>

@stop