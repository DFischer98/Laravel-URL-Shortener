<?php 

Class UrlHelper{

	//Adds http:// to all URLs
	public static function addHttp($url){

		rtrim($url, "/");

		
		if((Str::lower(substr($url, 0, 7)) == 'http://')
			|| (Str::lower(substr($url, 0, 8)) == 'https://')) {

			return $url;
		}

		else {
			return 'http://' . $url;
		} ;
	}

	public static function fullUrl($url){
		if((Str::lower(substr($url, 0, 11)) == 'http://www.')
			|| (Str::lower(substr($url, 0, 12)) == 'https://www.')){
			return $url;
		}

		elseif((Str::lower(substr($url, 0, 7)) == 'http://') 
			&& (Str::lower(substr($url, 8, 10)) !== 'www')){
				return  'http://www.' . substr($url, 8);
			}

		elseif((Str::lower(substr($url, 0, 8)) == 'https://') 
			&& (Str::lower(substr($url, 9, 11)) !== 'www')){
				return  'http://www.' . substr($url, 8);
			}

		elseif(Str::lower(substr($url, 0, 3)) == 'www'){
			return 'http://' . $url;
		}

		else{
			return  'http://www.' . $url;
		}		

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
	public static function getTitle($url){
		
		try {
			$str = file_get_contents($url);
		}
		catch(Exception $e) { 
			return $url;
		}

		try{

			if(strlen($str)>0){
				preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);
				return $title[1];
				}
		}

		catch(Exception $e) {
			return $url;
		}
	}	

	public static function getKey($url){
		if (substr($url, -1) == '/'){
			$str = substr($url, -7);
			$str = substr($str, 0, 6);
			return $str;
		}
		$str = substr($url, -6);
		return $str;
	}
}