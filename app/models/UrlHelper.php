<?php 

Class UrlHelper{

	//Makes sure all URLs start with http://www.
	public static function completeUrl($incomplete_url){


		
		if((Str::lower(substr($incomplete_url, 0, 7)) == 'http://')
		|| (Str::lower(substr($incomplete_url, 0, 8)) == 'https://')) {
			return $incomplete_url;
		}

		else {
			return 'http://' . $incomplete_url;
		} ;
	}

	public static function stripUrl($given_url){
		if(Str::lower(substr($given_url, 0, 11)) == 'http://www.'){
			return substr($given_url, 11);
		}

		elseif(Str::lower(substr($given_url, 0, 12)) == 'https://www.'){
			return substr($given_url, 12);
		}

		elseif(Str::lower(substr($given_url, 0, 4)) == 'www.'){
			return substr($given_url, 4);
		} 

		else{
			return $given_url;
		}
	}
	// http://stackoverflow.com/questions/4348912/get-title-of-website-via-link
	public static function getTitle($Url){
    $str = file_get_contents($Url);
    if(strlen($str)>0){
        preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);
        return $title[1];
		}
	}	
}