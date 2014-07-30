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

		@if(Auth::check())
			<a href='/logout'>Log out {{ Auth::user()->email; }}</a>
		@else 
			<a href='/signup'>Sign up</a> or <a href='/login'>Log in</a> &#60;- ignore this
		@endif
		
		@yield('nav')

		@yield ('content')
	</body>
</html>