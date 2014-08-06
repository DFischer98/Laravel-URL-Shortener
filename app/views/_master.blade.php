<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title', 'Daniel&#8217s URL Shortener')</title>
		<meta charset = 'UTF-8'>
		<link rel='stylesheet' type='text.css' href='../style.css'>
	</head>
	<body>
		@if(Session::get('flash_message'))
			<div class='flash-message'>{{ Session::get('flash_message') }}</div>
		@endif

		@include('navbar')

		
		@yield ('content')
		
	</body>
</html>