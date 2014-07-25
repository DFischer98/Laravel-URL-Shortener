<?php

class URLRedirect extends Eloquent {
	
	//Class name had to be renamed in order to avoid illuminate conflicts,
	//table name is still set to redirects
    protected $table = 'redirects';


	public function users() {
        # Tag belongs to User
        return $this->belongsTo('User');
    }
}