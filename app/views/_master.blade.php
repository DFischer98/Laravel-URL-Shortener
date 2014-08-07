<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title', 'Daniel&#8217s URL Shortener')</title>
		<meta charset = 'UTF-8'>
		<link rel='stylesheet' type='text.css' href='../style.css'>
	</head>
	<body>
		@if(Session::get('flash_pos'))
			<div class='flash-pos'>{{ Session::get('flash_pos') }}</div>
		@endif

		@if(Session::get('flash_neg'))
			<div class='flash-neg'>{{ Session::get('flash_neg') }}</div>
		@endif

		@include('navbar')

		
		@yield ('content')
		
	</body>
</html>