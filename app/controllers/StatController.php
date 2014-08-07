<?php

class StatController extends BaseController {
	
	public function redirectStat($redirect_key){
		$redirect = URLRedirect::whereRedirectKey($redirect_key)->first();

		if (is_null($redirect)){
			return Redirect::to('/')->with('flash_neg', 'Invalid URL!');;
		}

		$data = array(
			'redirect_key' => $redirect->redirect_key,
			'redirect_url' => $redirect->shortened_url,
			'hits' => $redirect->hits
			);


		return View::make('redirect_statistic', $data);

	}

	public function landing(){
		return View::make('stat_search');
	}

	public function postSearch(){
		//get query
		$link = Input::get('link');
		$key = UrlHelper::getKey($link);


		$redirect = URLRedirect::whereRedirectKey($link)->first();

		if (is_null($redirect)){
			return Redirect::to('/stat_search')->with('flash_neg', 'Invalid URL!');;
		}
		$data = array(
			'redirect_key' => $redirect->redirect_key,
			'redirect_url' => $redirect->shortened_url,
			'hits' => $redirect->hits
			);


		return View::make('redirect_statistic', $data);		

	}

}