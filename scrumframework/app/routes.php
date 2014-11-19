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

//HOME PAGE.
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showhome'));

//SIGN UP.
Route::post('/signup', 'FormController@index');

//[POST]MAIN PAGE WHEN LOGEDIN.
Route::post('/main', 'LoginController@index');

//[GET]MAIN PAGE WHEN LOGEDIN.
Route::get('/main', array('as' => 'main',
	'before' => 'auth',
	function()
	{
		$email = Auth::user()->email;
		Session::flash('email',$email);
		return View::make('main')->withInput(Input::except('password'));
	}
));


//CREATE BOARD.
Route::post('taskboard',array('before' => 'auth' ,'uses'=>'TaskboardController@create'));

//ACCESS BOARD.
Route::get('taskboard/{id}/{bid}',array('before' => 'auth' ,'uses'=>'TaskboardController@getTaskboard'));

//Recieve Board
Route::post('/recievedboard', 'SprintnameController@store');

//DELETE BOARD.
Route::get('taskboard/{id}/{bid}/delete',array('before' => 'auth' ,'uses'=>'TaskboardController@deleteTaskboard'));

//DELETE PO.
Route::get('/deletetaskboard/po/{tid}/{poname}',array('before' => 'auth' ,'uses'=>'TeamController@deleteProductOwner'));

//DELETE TM.
Route::get('/deletetaskboard/tm/{tid}/{tmname}',array('before' => 'auth' ,'uses'=>'TeamController@deleteTeamMember'));

//ADD TEAM
Route::post('/addteam', array('before' => 'auth' ,'uses'=>'TeamController@store'));

//ADD USER IN TEAM.
Route::post('/adduser', array('before' => 'auth' ,'uses'=>'TeamController@adduser'));

//GET BOARD IN JSON FORMAT
Route::get('/gettesttaskboard', array('before' => 'auth' ,'uses'=>'TaskboardController@getTaskboard'));

//GET BOARD IN JSON FORMAT
Route::get('/gettestuser', 'LoginController@userToJSON');

//LOG OUT.
Route::get('/logout', function()
{
	Auth::logout();
	return Redirect::to('/');
});

//Page not found.
Route::get('/404', array('as' => '404', function()
{
	return App::abort(404);
}));