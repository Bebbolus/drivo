<?php

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
| Application Routes for ADMINISTRATION
|--------------------------------------------------------------------------
*/

Route::get('home', array('as' => 'home', function() 
	{
		return View::make('start', array('main_path' => Config::get('app.main_path')));
	}))->before('auth');


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::when('admin/*', 'role:5'); 
//_____________________________________________________________________________________________________________/
//USER ADMINISTRATION ROUTE
	Route::get ('admin/user/list',  ['as'=>'user.list',     'uses'=>'UsersController@showAll']);
	Route::get ('admin/user/create',['as'=>'create',   	  	'uses'=>'UsersController@create']);
	Route::post('admin/user/create',['as'=>'user.store', 	'uses'=>'UsersController@store'])->before('csrf');
	Route::post('admin/user/delete',['as'=>'user.delete', 	'uses'=>'UsersController@delete']);
	Route::post('admin/user/update',['as'=>'user.update', 	'uses'=>'UsersController@update'])->before('csrf');
	
	
	Route::get('admin/user/edit/{id}', array('as' => 'user.edit', function($id) 
	{
		return View::make('users.edit', array('main_path' => Config::get('app.main_path'))) 
			->with('user', User::findOrFail($id));
	}));

//_____________________________________________________________________________________________________________/
//SCHOOL ADMINISTRATION ROUTE
	Route::get ('admin/school/list',  ['as'=>'school.list',     'uses'=>'SchoolsController@showAll']);
	Route::get ('admin/school/create',['as'=>'create',   	  	'uses'=>'SchoolsController@create']);
	Route::post('admin/school/create',['as'=>'school.store', 'uses'=>'SchoolsController@store'])->before('csrf');
	Route::post('admin/school/delete',['as'=>'school.delete', 'uses'=>'SchoolsController@delete']);
	Route::post('admin/school/update',['as'=>'school.update', 'uses'=>'SchoolsController@update'])->before('csrf');
	
	
	Route::get('admin/school/edit/{id}', array('as' => 'school.edit', function($id) 
	{
		return View::make('school.edit', array('main_path' => Config::get('app.main_path'))) 
			->with('school', School::findOrFail($id));
	}));
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
Route::when('schooladmin/*', 'role:1');


//_____________________________________________________________________________________________________________/
//ADDRESS ROUTES
Route::get ('schooladmin/address/list',  ['as'=>'address.list',     'uses'=>'AddressesController@showAll']);
Route::get ('schooladmin/address/create',['as'=>'address.create',   'uses'=>'AddressesController@create']);
Route::post('schooladmin/address/create',['as'=>'address.store', 'uses'=>'AddressesController@store'])->before('csrf');
Route::post('schooladmin/address/delete',['as'=>'address.delete', 'uses'=>'AddressesController@delete']);
Route::post('schooladmin/address/update',['as'=>'address.update', 'uses'=>'AddressesController@update'])->before('csrf');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////



//_____________________________________________________________________________________________________________/
//RESERVATION ROUTES
Route::get ('schooladmin/reservation/list',  ['as'=>'reservation.list',     'uses'=>'ReservationsController@showAll']);
Route::get ('schooladmin/reservation/calendar',['as'=>'reservation.calendar',   'uses'=>'ReservationsController@showCalendar']);
Route::get ('schooladmin/reservation/create',['as'=>'reservation.create',   'uses'=>'ReservationsController@create']);
Route::post('schooladmin/reservation/create',['as'=>'reservation.store', 'uses'=>'ReservationsController@store'])->before('csrf');
Route::post('schooladmin/reservation/delete',['as'=>'reservation.delete', 'uses'=>'ReservationsController@delete']);
Route::post('schooladmin/reservation/update',['as'=>'reservation.update', 'uses'=>'ReservationsController@update'])->before('csrf');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////


//_____________________________________________________________________________________________________________/
//INSTRUCTORS ROUTES
Route::get ('schooladmin/instructor/list',  ['as'=>'instructor.list',     'uses'=>'InstructorsController@showAll']);
Route::get ('schooladmin/instructor/create',['as'=>'instructor.create',   'uses'=>'InstructorsController@create']);
Route::post('schooladmin/instructor/create',['as'=>'instructor.store', 'uses'=>'InstructorsController@store'])->before('csrf');
Route::get ('schooladmin/instructor/calendar',['as'=>'instructor.calendar',   'uses'=>'InstructorsController@showCalendar']);
Route::post('schooladmin/instructor/delete',['as'=>'instructor.delete', 'uses'=>'InstructorsController@delete']);
Route::post('schooladmin/instructor/update',['as'=>'instructor.update', 'uses'=>'InstructorsController@update'])->before('csrf');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////


/*
|--------------------------------------------------------------------------
| Application Routes for USER REGISTRATION from GUEST
|--------------------------------------------------------------------------
Route::get('register', 'UsersController@create')->before('guest');
*/