<?php

/*
|--------------------------------------------------------------------------
| Application Routes for GUEST
|--------------------------------------------------------------------------
*/


Route::get('/', ['as'=>'home', 'uses'=>'PagesController@index']); //first screen: Home Page

/*
|--------------------------------------------------------------------------
| Application LOGIN
|--------------------------------------------------------------------------
*/
Route::get('login', [ 'as'=>'login','uses'=>'SessionsController@create']); //login short url
Route::get('logout', [ 'as'=>'logout','uses'=>'SessionsController@destroy']); //logout short url




/*
|--------------------------------------------------------------------------
| Application Routes for AUTHENTICATED USER
|--------------------------------------------------------------------------
*/

Route::get('sessions.store', ['as'=>'sessions.store','uses'=>'SessionsController@store']); //user session start
Route::post('sessions.store', 'SessionsController@store')->before('csrf'); //user session start
//Route::resource('sessions','SessionsController');


/*
|--------------------------------------------------------------------------
| Application Routes for REGISTER USER
|--------------------------------------------------------------------------
*/

Route::get('register', 'UsersController@create')->before('guest');
Route::post('register', ['as'=>'users.store', 'uses'=>'UsersController@store'])->before('csrf');


Route::get('admin', function()
{
	return 'Admin Page';
})->before('auth');
