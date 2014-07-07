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
	
		$validator = Validator::make($input,[
		'email'=>'required|email|unique:users', 
		'password'=>'required|min:8|confirmed',
		'username'=>'required|min:2|alpha_num|unique:users'
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
			'surname'=>Input::get('surname'),
			'group'=>'0'
		]);

		//Auth::login($user);


		return Redirect::to('admin/user/list')->with('message', 'Utente Creato');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showAll()
	{
		return View::make('users.list', array('main_path' => Config::get('app.main_path'), 'allUser'=> $this->getAllUser() ));
	}

	
	public function getAllUser()
	{
		$list = User::all();
		return $list;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		return View::make('users.edit', array('main_path' => Config::get('app.main_path')))->with('user', User::find($id));;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input=Input::all();
	
		$validator = Validator::make($input,[
		'email'=>'required|email', 
		'username'=>'required|min:2|alpha_num',
		'group'=>'required',
		'id'=>'required|numeric|exists:users,id'
		]);

		$user = User::find(Input::get('id'));

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}
		
		
		$user->email = Input::get('email');
		$user->username= Input::get('username');
		$user->group= Input::get('group');
		
		$user->save();

		return Redirect::to('admin/user/list')->with('message', 'Utente Modificato con successo!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete()
	{
		
		$input=Input::all();
	
		$validator = Validator::make($input,[
		'id'=>'required|numeric|exists:users,id'
		]);



		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}
		
		$user = User::find(Input::get('id'));
		
		echo "sto per eliminare " . $user->username;
		$user->delete();
		
		return Redirect::to('/admin/user/list')->with('message', 'Utente Eliminato');
		
	}

}
