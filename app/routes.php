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
Route::get('/', 'HomeController@homepage');

// Returns users to homepage form
Route::controller('generate', 'RedirectController');

// User handling
Route::get('/signup', 'UserController@getSignup'); 
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', ['before' => 'csrf', 'uses' => 'UserController@postSignup'] );
Route::post('/login', ['before' => 'csrf', 'uses' => 'UserController@postLogin'] );
Route::get('/logout', ['before' => 'auth', 'uses' => 'UserController@getLogout'] );

Route::get('/my-account', ['before' => 'auth', 'uses' => 'UserController@getAccount'] );


// Debug
Route::get('/debug', 'DebugController@debug');

// Stats landing page
Route::get('/stats', 'StatController@landing');


// Get statistics for given redirect key
Route::get('/stats/{redirect_key}', 'StatController@redirectStat');

// Leave this last so routes.php can catch other site URIs first
Route::get('/{redirect_key?}', 'RedirectController@callRedirect');


