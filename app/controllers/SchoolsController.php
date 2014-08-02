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
		$data= [
		  'school' => School::findOrFail($id),
		  'consortiumList' => School::where('is_consortium', '=', true)
									  ->where('id', '!=', $id)
									  ->get()
		  ];
		 
		
		return View::make('schools.edit', array('main_path' => Config::get('app.main_path'))) 
			->with('data', $data);
		
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
		'name'=>'required|min:2|alpha_num',
		'phone'=>'required|numeric',
		'fax'=>'numeric',
		'id'=>'required|numeric|exists:schools,id',
		'is_consortium'=>'numeric',
		'schoolConsrtium'=>'array|exists:schools,id'
		]);


		if($validator->fails())
		{
			dd($validator->messages());
			//return Redirect::back()->withInput()->withErrors($validator->messages());
		}
		
		
		$school = School::findOrFail(Input::get('id'));
		
		$school->email = Input::get('email');
		$school->name= Input::get('name');
		$school->phone= Input::get('phone');
		$school->fax= Input::get('fax');
		
		if (Input::get('is_consortium') === '1')
		{
			$school->is_consortium= true;
		}
		else
		{
			$school->is_consortium= false;
		}
		
		//remove ALL old consortium
		$school->consortium()->detach();
		if(Input::has('schoolConsrtium')){
			//consortium ADD
			foreach (Input::get('schoolConsrtium') as $consortium){			
					$school->consortium()->attach($consortium);
			}
		}
		
		$school->save();

		return Redirect::to('admin/school/list')->with('messages', 'Utente Modificato con successo!');
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
