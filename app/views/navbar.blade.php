
<div class = 'navbar'>
	<ul>	
		<li id = 'current_page'><a href='/'><span class = 'underline'>Home</span></a></li>

		<li><a href='/stats'><span class = 'underline'>Stats</span></a></li>

		@if(Auth::check())
			<li><a href='/my-account'><span class = 'underline'>My Account</span></a></li>
			
			<li><a href='/logout'><span class = 'underline'>Log Out</span></a></li>
						
		@else 	
			
			<li><a href='/signup'><span class = 'underline'>Sign Up</span></a></li>

			<li><a href='/login'><span class = 'underline'>Log In</span></a></li>
		@endif	
	</ul>
</div>