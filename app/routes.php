<?php
/*
|--------------------------------------------------------------------------
| Application Routes for ADMINISTRATION
|--------------------------------------------------------------------------
*/

Route::get('start',['uses'=>'PagesController@index'])->before('auth');
Route::get('home',['uses'=>'PagesController@index'])->before('auth');

Route::get('admin',['uses'=>'PagesController@admin'])->before('auth');


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
| Application Routes for AUTHENTICATED USER
|--------------------------------------------------------------------------
*/

Route::get('sessions.store', ['as'=>'sessions.store','uses'=>'SessionsController@store']); //user session start
Route::post('sessions.store', 'SessionsController@store')->before('csrf'); //user session stop
//Route::resource('sessions','SessionsController');


/*
|--------------------------------------------------------------------------
| Application Routes for REGISTER USER
|--------------------------------------------------------------------------


Route::get('register', 'UsersController@create')->before('guest');
Route::post('register', ['as'=>'users.store', 'uses'=>'UsersController@store'])->before('csrf');
*/


