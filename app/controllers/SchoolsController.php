<?php

class SchoolsController extends \BaseController {

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
		return View::make('schools.create', array('main_path' => Config::get('app.main_path')));
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
		'name'=>'required|min:2|alpha_num|unique:schools',
		'email'=>'email', 
		'phone'=>'required|unique:schools'
		]);



		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}


		/*create the school*/
		$school= School::create([
			'name' => Input::get('name'),
			'email'=>Input::get('email'),
			'phone'=>Input::get('phone'),
			'fax'=>Input::get('fax')
		]);


		return Redirect::to('admin/school/list')->with('messages', 'Scuola Guida ' . $school->name .' Creata');
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showAll()
	{
		return View::make('schools.list', array('main_path' => Config::get('app.main_path'), 'allSchool'=> $this->getAllSchool() ));
	}


	
	public function getAllSchool()
	{
		$list = School::all();
		return $list;
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
	public function delete()
	{
		$input=Input::all();
	
		$validator = Validator::make($input,[
		'id'=>'required|numeric|exists:schools,id'
		]);



		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}
		
		$school = School::find(Input::get('id'));
		
		echo "sto per eliminare " . $school->username;
		$school->delete();
		
		return Redirect::to('/admin/school/list')->with('message', 'Autoscuola Eliminata');
	}


}
