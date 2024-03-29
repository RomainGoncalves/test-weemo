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

Route::get('/', 'HomeController@showWelcome');

Route::get('login', function(){
	return View::make('login');

});

Route::post('login',array('as' => 'login', 'uses' => 'AuthController@login'));

Route::resource('users', 'UsersController');

Route::resource('contacts', 'ContactsController');