<?php

class RedirectController extends BaseController{

    public function redirect($redirect_id){
        return Redirect::away(UrlCreator::urlFix($redirect_id));
    }

    public function homepage(){
        return View::make('index');
    }

    public function generateRedirect(){
        // Get query data 
        $data = Input::all();

        // Validate URL
        $rules = array(
            'URL' => 'active_url'
        );

         $validator = Validator::make($data, $rules);


        if ($validator->passes()) {
            echo 'Valid URL';
            echo '<br>' . str_random(6);
            //make redirect
        }

        else {
            echo 'Invalid URL';
        }
        //Send to error page
        //return View::make('generate_error');

    }
}

