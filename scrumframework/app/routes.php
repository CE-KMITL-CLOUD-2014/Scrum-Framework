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

/*
Route::get('/', function()
{
	return View::make('home');
});
 */

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showhome'));

Route::get('/logedin', array('as' => 'logedin', 'uses' => 'HomeController@showLogin'));


Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('/inside', function()
{
	return "Hello inside";
});
Route::get('/404', function()
{
	return App::abort(404);
});
