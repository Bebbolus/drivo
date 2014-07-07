<?php
/*
|--------------------------------------------------------------------------
| Application Routes for ADMINISTRATION
|--------------------------------------------------------------------------
*/



Route::get('home',['as'=>'home', 'uses'=>'PagesController@index'])->before('auth');

Route::when('admin/*', 'role:5');
	Route::get ('admin/user/list',  ['as'=>'user.list',     'uses'=>'UsersController@showAll']);
	//Route::get ('admin/user/show',  ['as'=>'show',        'uses'=>'UsersController@show']);
	Route::get ('admin/user/create',['as'=>'create',   	  'uses'=>'UsersController@create']);
	Route::post('admin/user/create',['as'=>'user.store', 'uses'=>'UsersController@store'])->before('csrf');
	Route::post('admin/user/delete',['as'=>'user.delete', 'uses'=>'UsersController@delete']);
	//Route::post('admin/user/update',['as'=>'user.update', 'uses'=>'UsersController@update']);
	Route::get ('admin/user/edit',  ['as'=>'user.edit', 'uses'=>'UsersController@edit'])->before('csrf');
	

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