@extends('_master')

@section('content')
<h1>Your Links</h1>

@foreach($data as $card)
	<div class = 'card' id='one-of-many'>
	<h2>{{UrlHelper::getTitle($card['shortened_url'])}}</h2>
	<h3><a href = '{{URL::to('/', $card["redirect_key"])}}'>{{URL::to('/', $card['redirect_key'])}}</a></h3>
	<p><a href = "{{$card['shortened_url']}}">{{str_limit($card['shortened_url'], $limit = 50)}}</a></p>	
	<p>Hits: {{$card['hits']}}</p>




</div>
@endforeach

@stop