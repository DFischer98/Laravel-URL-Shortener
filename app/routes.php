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

// User signup
Route::controller('signup', 'UserController');

// Debug
Route::get('/debug', 'DebugController@debug');

// Get statistics for given redirect key
Route::get('/stats/{redirect_key?}', 'RedirectController@statistics');

// Leave this last so routes.php can catch other site URIs first
Route::get('/{redirect_key?}', 'RedirectController@callRedirect');


