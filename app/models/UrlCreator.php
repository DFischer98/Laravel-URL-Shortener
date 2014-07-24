<?php 

Class UrlCreator{

	//Makes sure all URLs start with http://www.
	public static function urlFix($incomplete_url){


		
		if(Str::lower(Str::limit($incomplete_url, 7)) == 'http://...') {
			return $incomplete_url;
		}

		elseif(Str::lower(Str::limit($incomplete_url, 3)) == 'www...') {
			return 'http://' . $incomplete_url;
		}

		else {
			return 'http://www.' . $incomplete_url;
		} ;
	}
}