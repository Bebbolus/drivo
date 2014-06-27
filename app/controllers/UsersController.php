<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create', array('main_path' => Config::get('app.main_path')));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input=Input::all();
		$input['name'] =str_replace(' ', '', trim($input['name']));
		$input['surname'] =str_replace(' ', '', trim($input['surname']));

		$validator = Validator::make($input,[
		'email'=>'required|email|unique:user', 
		'password'=>'required|min:8|confirmed',
		'username'=>'required|min:2|alpha_num|unique:user',
		'name'=>'required|min:2|alpha',
		'surname'=>'required|min:2|alpha'
		]);



		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}


		/*create the user*/
		$user = User::create([
			'email' => Input::get('email'),
			'password' => Hash::make(Input::get('password')),
			'username'=>Input::get('username'),
			'name'=>Input::get('name'),
			'surname'=>Input::get('surname')
		]);

		Auth::login($user);


		return Redirect::home();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
