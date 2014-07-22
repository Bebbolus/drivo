<?php

use Illuminate\Support\Facades\Auth;
class InstructorsController extends \BaseController {

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
		return View::make('instructors.create', array('main_path' => Config::get('app.main_path')));
	}	

	public function showCalendar()
	{
// 		return View::make('instructors.calendar', array('main_path' => Config::get('app.main_path')));
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
// 		'street'=>'required|min:2|alpha_num',
// 		'city'=>'required|min:2|alpha',
// 		'province'=>'required|max:2|alpha'//,
// 		//'zip'=>'required|max:5|numeric'
		]);



		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}


		


		return Redirect::to('schooladmin/address/list')->with('messages', Lang::get('messages.result.address.created'));
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
		return View::make('instructors.list', array('main_path' => Config::get('app.main_path'), 'allInstructors'=> $this->allInstructors() ));
	}


	
	public function allInstructors()
	{
		$list = Instructors::where('id_school', '=', Auth::user()->id_school)->get();
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
		
		return Redirect::to('/admin/school/list')->with('message', 'Utente Eliminato');
	}


}
