<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($userID)
	{
		//TEMPORARY
		return View::make('users.profile', array('main_path' => Config::get('app.main_path'), 'targhetUser'=> $this->getTheUser($userID) ));
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


		return Redirect::to('admin/user/list')->with('flash_message',  Lang::get('messages.result.user.created'));
		
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
		$list = User::with('school')->get();
		return $list;
	}
	
	public function getTheUser($userID)
	{
		$user = User::find($userID);
		return $user;
	} 

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		
		$data= [
		'user' => User::findOrFail($id),
		'schoolList' => School::all()
		];
		return View::make('users.edit', array('main_path' => Config::get('app.main_path'))) 
			->with( 'data', $data );
		
		/*$data['user'] = User::find($id)->with('school')->get();
		$data['schoolList'] = School::all();
		return View::make('users.edit', array('main_path' => Config::get('app.main_path'))); //->with('data', $data);
		//return View::make('users.edit', array('main_path' => Config::get('app.main_path')))->with('user', User::find($id)->with('school')->get());
	*/}


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
		'id'=>'required|numeric|exists:users,id',
		'userSchools'=>'array|exists:schools,id'
		]);


		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}
		
		
		$user = User::find(Input::get('id'));
		
		$user->email = Input::get('email');
		$user->username= Input::get('username');
		$user->group= Input::get('group');
		
		
		
		//remove ALL old scholl
		$user->school()->detach();
		if(Input::has('userSchools')){
			//scholl ADD
			foreach (Input::get('userSchools') as $school){			
					$user->school()->attach($school);
			}
		}
		
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
