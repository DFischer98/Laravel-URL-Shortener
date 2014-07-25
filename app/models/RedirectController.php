<?php

class redirectController extends BaseController{

	public function callRedirect($given_redirect){
		$called_redirect = URLRedirect::whereRedirectKey($given_redirect)->first();
		//$called_redirect = URLRedirect::find(1);
		$called_redirect->hits = $called_redirect->hits + 1;
		$called_redirect->save();

		return Redirect::away($called_redirect->shortened_url);


	}

	public function homepage(){
		return View::make('index');
	}

	public function generateRedirect(){
		// Get query data 
		$url = Input::get('URL');
		
		//format for validation URL check
		$url = UrlFormatting::stripUrl($url);
		$data = array('URL' => $url);


		// Validate URL 
		$rules = array(
			'URL' => 'active_url'
		);


		 $urlValidator = Validator::make($data, $rules);


		if ($urlValidator->passes()) {
			//generate unique redirect key, check with validation
			$data = array('key' => str_random(6));
			$rules = array('key' => 'unique:redirects,redirect_key');
			$keyValidator = Validator::make($data, $rules);

			//If key exists, loop until unique key is generated
			while($keyValidator->fails()){
				$data = array('key' => str_random(6));
				$keyValidator = Validator::make($data, $rules);
			}
			
			//make object & save redirect
			$redirect = new URLRedirect;
			$redirect->redirect_key = $data['key'];
			//turn stripped URL into full URL for redirecting
			$redirect->shortened_url = UrlFormatting::completeUrl($url);
			$redirect->hits = 0;

			//user assignment, WIP
			$logged_in_user = False;
			
			if($logged_in_user){
				//link FK to user
			}
			//assign FK null
			else{
				$redirect->user_id = NULL;
			}

			$redirect->save();
			//echo link to redirect
			echo '<a href="/' . $redirect->redirect_key . '"">' 
			. 'localhost/' . $redirect->redirect_key . '</a>';


		}

		else {
			echo 'Invalid URL';
		}
		//Send to error page
		//return View::make('generate_error');

	}
}

