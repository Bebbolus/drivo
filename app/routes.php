<?php
/*
|--------------------------------------------------------------------------
| Application Routes for ADMINISTRATION
|--------------------------------------------------------------------------
*/

Route::get('home',['as'=>'home', 'uses'=>'PagesController@index'])->before('auth');
Route::get('users.list',['as'=>'usersList', 'uses'=>'UsersController@userList'])->before('role:5');
Route::get('users.create',['uses'=>'UsersController@create'])->before('role:5');

Route::post('register', ['as'=>'users.store', 'uses'=>'UsersController@store'])->before('csrf');

/*
|--------------------------------------------------------------------------
| Application Routes for GUEST
|--------------------------------------------------------------------------
*/

Route::get('/', function()
{
	return View::make('welcome', array('main_path' => Config::get('app.main_path')));
});

/*
|--------------------------------------------------------------------------
| Application LOGIN
|--------------------------------------------------------------------------
*/
Route::get('login', [ 'as'=>'login','uses'=>'SessionsController@create']); // Pagina di login
Route::get('logout', [ 'as'=>'logout','uses'=>'SessionsController@destroy']); //logout short url


/*
|--------------------------------------------------------------------------
| Application Routes for USER AUTENTICATION
|--------------------------------------------------------------------------
*/

Route::get('sessions.store', ['as'=>'sessions.store','uses'=>'SessionsController@store']); //user session start
Route::post('sessions.store', 'SessionsController@store')->before('csrf'); //user session stop


/*
|--------------------------------------------------------------------------
| Application Routes for USER REGISTRATION from GUEST
|--------------------------------------------------------------------------
Route::get('register', 'UsersController@create')->before('guest');
*/