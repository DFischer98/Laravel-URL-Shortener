<?php

class UserController extends BaseController {


	public function __construct() {
        $this->beforeFilter('guest', array('only' => array('getLogin','getSignup')));	
    }

	
	
	public function getSignup() {
		
		return View::make('user_signup');
		
	}
	
	public function postSignup() {
		
		# Step 1) Define the rules			
		$rules = array(
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'	
		);			
			
		# Step 2) 		
		$validator = Validator::make(Input::all(), $rules);
		
		# Step 3
		if($validator->fails()) {
			
			return Redirect::to('/signup')
				->with('flash_neg', 'Sign up failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}
					
		$user = new User;
		$user->email    = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		
		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('flash_neg', 'Sign up failed; please try again.')
				->withInput();
		}
		
		# Log in
		Auth::login($user);
		
		return Redirect::to('/')->with('flash_pos', 'Welcome!');
				
	}
	
	public function getLogin() {
		

		return View::make('user_login');
		
	}
	
	public function postLogin() {
		
		$credentials = Input::only('email', 'password');
	
		if (Auth::attempt($credentials, $remember = true)) {
			return Redirect::intended('/')->with('flash_pos', 'Welcome Back!');
		}
		else {
			return Redirect::to('/login')
				->with('flash_neg', 'Log in failed; please try again.')
				->withInput();
		}
		
		return Redirect::to('login');
				
	}
	
	
	public function getLogout() {
		
		# Log out
		Auth::logout();
	
		# Send them to the homepage
		return Redirect::to('/');

	}

	public function getAccount() {
		$redirects = Auth::user()->redirects;
		echo Pre::render($redirects);
	}
		
}