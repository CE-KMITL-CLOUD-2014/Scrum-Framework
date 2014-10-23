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

//Blade::setContentTags('<%', '%>');			// for variables and all things Blade
//Blade::setEscapedContentTags('<%%', '%%>'); 	// for escaped data

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showhome'));


Route::get('/main', array(
	'before' => 'auth',
	function()
	{
		$email = Auth::user()->email;
		Session::flash('email',$email);
		return View::make('main')->withInput(Input::except('password'));
	}
));

Route::post('/main', function(){
	$login = new LoginController;
	return $login->index();
});

Route::get('/gettaskboard', function(){
	$board = new TaskboardController;
	return $board->getTaskboard();
});

Route::post('/taskboard', array(
	'before' => 'auth',
	function()
	{
		$boardname = Input::get('boardname');
        $taskboardController = new TaskboardController;
		//show email @ navbar 
		// $email = Auth::user()->email; 
		// Session::flash('email',$email);
		// Session::flash('boardname',$boardname);
		// return View::make('login')->withInput(Input::except('password'));
        return $taskboardController->index();
	}
));


Route::get('taskboard/{id}', array(
	'before' => 'auth', function($id)
{
    return 'boardid='.$id;
}));


Route::get('/gettesttaskboard', 'TaskboardController@getTaskboard');

Route::get('/logout', function()
{
	Auth::logout();
	return Redirect::to('/');
	//return Response::make('You are now logged out. :(');
});

Route::post('/signup', function(){
	$form = new FormController;
	return $form->index();
});

Route::get('/inside', function()
{
	return "Hello inside";
});
Route::get('/404', function()
{
	return App::abort(404);
});

