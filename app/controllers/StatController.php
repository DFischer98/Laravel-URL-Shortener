<?php

class StatController extends BaseController {
	
	public function redirectStat($redirect_key){
		$redirect = URLRedirect::whereRedirectKey($redirect_key)->first();

		if (is_null($redirect)){
			return Redirect::to('/')->with('flash_message', 'Invalid URL!');;
		}

		$data = array(
			'redirect_key' => $redirect->redirect_key,
			'redirect_url' => $redirect->shortened_url,
			'hits' => $redirect->hits
			);


		return View::make('redirect_statistic', $data);

	}

}