<?php

class RedirectController extends BaseController{

	public function callRedirect($given_redirect){
		
		//create validator to find if key exists
		$data = array('key' => $given_redirect);
		$rules = array('key' => 'unique:redirects,redirect_key');

		$valid_redirect = Validator::make($data, $rules);

		//redirect
		if ($valid_redirect->fails()){
			$called_redirect = URLRedirect::whereRedirectKey($given_redirect)->first();
			$called_redirect->hits = $called_redirect->hits + 1;
			$called_redirect->save();
			return Redirect::away($called_redirect->shortened_url);
		}

		//return to homepage with flash error
		return Redirect::to('/')->with('flash_neg', 'Invalid URL!');


	}

	public function testRedirect($given_redirect){
		$called_redirect = URLRedirect::whereRedirectKey($given_redirect)->first();
		$called_redirect->hits = $called_redirect->hits + 1;
		$called_redirect->save();

		echo 'Redirected';
	}

	//redirect if user browses to /generate
	public function getIndex(){
		return Redirect::action('HomeController@homepage');
	}

	//generate redirect
	public function postIndex(){
		// Get query data 
		$url = Input::get('URL');

		$url = UrlHelper::addHttp($url);
		//redirect key recycling
		if (!Auth::check()){
			//look for an existing redirect that doesnt belong to a user
			$existing_redirect = DB::table( 'redirects' )->where( 'shortened_url', '=', $url )->whereNull('user_id')->first();
				//return found redirect 
				if (! is_null($existing_redirect)){
					$data = array('redirect_key' => $existing_redirect->redirect_key,
					'redirect_url' => $existing_redirect->shortened_url);

					return View::make('result', $data);
				}
		}

		//generate random key
		$random_key = str_random(6);

		//check if row exists in DB with key already used
		$existing_key = DB::table('redirects')->where('redirect_key', '=', $random_key)->first();

		//generate new keys until unique value is made
		while (! is_null($existing_key)){
			$random_key = str_random(6);
			$existing_key = DB::table('redirects')->where('redirect_key', '=', $random_key)->first();
		}

		//make object & save redirect
		$redirect = new URLRedirect;
		$redirect->redirect_key = $random_key;
		$redirect->shortened_url = $url;
		$redirect->hits = 0;
		
		//add FK user_id if logged in	
		if (Auth::check()){
			$redirect->user_id = Auth::user()->id;
		}
		else{
			$redirect->user_id = NULL;
		}

		$redirect->save();

		$data = array('redirect_key' => $redirect->redirect_key,
					'redirect_url' => $redirect->shortened_url);

		return View::make('result', $data);

	}	
}

