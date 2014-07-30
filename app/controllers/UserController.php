<?php

class UserController extends BaseController{
	
	public function getSignup(){
		array(
		'before' => 'guest',
		function() {
			return View::make('signup');
		});
	}

	public function postSignup(){

	}

}