<?php

class UserController extends BaseController{

	public function __construct() {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }
	
	public function getSignup(){
		if (Auth::check()){
			return Redirect::to('/')->with('flash_message', 'Already signed in!');
		}
		return View::make('signup');
		
	}

	public function postSignup(){

		if (Auth::check()){
			return Redirect::to('/')->with('flash_message', 'Already signed in!');
		}

		$user = new User;
		$user->email    = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->email    = Input::get('email');

		# Try to add the user 
		try {
			$user->save();
		}
		# Fail
		catch (Exception $e) {
			return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
		}

		# Log the user in
		Auth::login($user);

		return Redirect::to('/')->with('flash_message', 'Welcome to my URL shortener!');

	}
}