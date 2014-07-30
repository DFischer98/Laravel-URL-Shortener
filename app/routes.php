<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Homepage
Route::get('/', 'RedirectController@homepage');

// The homepage redirect form submits here via post, will experiment w/ ajax later.
Route::post('/generate', 'RedirectController@generateRedirect');


// Returns users to homepage form
Route::get('/generate', function(){
	return Redirect::action('RedirectController@homepage');
});



// User signup
Route::get('/signup', 'UserController@getSignup');



// Signup
Route::post('/signup', 
    array(
        'before' => 'csrf', 
        function() {

            $user = new User;
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->email    = Input::get('email');

            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/')->with('flash_message', 'Welcome to my URL shortener!');

        }
    )
);

// Debug
Route::get('/debug', 'DebugController@debug');

//Simulate a redirect without actually redirecting
Route::get('/test/{redirect_key?}', 'RedirectController@testRedirect');

// Leave this last so routes.php can catch other site URIs first
Route::get('/{redirect_key?}', 'RedirectController@callRedirect');


