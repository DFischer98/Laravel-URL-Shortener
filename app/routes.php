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
Route::get('/', 'redirectController@homepage');

// The homepage redirect form submits here via post, will experiment w/ ajax later.
Route::post('/generate', 'redirectController@generateRedirect');


// Returns users to homepage form
Route::get('/generate', function(){
	return Redirect::action('redirectController@homepage');
});


// Test mySQL connection
Route::get('/mysql-test', function() {

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    return Pre::render($results);

});

// Debug
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});



// Leave this last so routes.php can catch other site URIs first.
Route::get('/{redirect_id?}', 'redirectController@redirect');
