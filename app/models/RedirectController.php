<?php

class RedirectController extends BaseController{

	public function redirect($redirect_id){
		return Redirect::away(UrlCreator::urlFix($redirect_id));
	}

}
