<?php

class AddressesController extends \BaseController {

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
		return View::make('addresses.create', array('main_path' => Config::get('app.main_path')))->with('schoolList', School::all());
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
		'address'=>'required|min:3',
		'city'=>'required|min:2|alpha',
		'province'=>'required|max:2|alpha',
		'zip'=>'required|numeric',
		'id_school'=>'required|exists:schools,id'
		]);



		if($validator->fails())
		{
			//dd($validator->messages());
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}


		/*create the address*/
		$address = Address::create([
			'address' => Input::get('address'),
			'city'=>Input::get('city'),
			'province'=>Input::get('province'),
			'zip'=>Input::get('zip'),
			'id_school'=>Input::get('id_school')
		]);



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
		return View::make('addresses.list', array('main_path' => Config::get('app.main_path'), 'allAddresses'=> $this->getAddresses() ));
	}


	
	public function getAddresses()
	{
		$list = Address::all();
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
		$data = [
		'schoolList' => School::all(),
		'address' => Address::findOrFail($id)
		];
		
		return View::make('addresses.edit', array('main_path' => Config::get('app.main_path')))->with('data', $data);
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
		'address'=>'required|min:3',
		'city'=>'required|min:2|alpha',
		'province'=>'required|max:2|alpha',
		'zip'=>'required|numeric',
		'id_school'=>'required|exists:schools,id'
		]);



		if($validator->fails())
		{
			//dd($validator->messages());
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}


		/*create the address*/
		$address = Address::findOrFail(Input::get('id'));
		
		
			$address->address = Input::get('address');
			$address->city=Input::get('city');
			$address->province=Input::get('province');
			$address->zip=Input::get('zip');
			$address->id_school=Input::get('id_school');
		

		$address->save();

		return Redirect::to('schooladmin/address/list')->with('messages', Lang::get('messages.result.address.created'));
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
		'id'=>'required|numeric|exists:addresses,id'
		]);



		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}
		
		$address = Address::find(Input::get('id'));
		$address->delete();
		
		return Redirect::to('/schooladmin/address/list')->with('message', 'Indirizzo Eliminato');
	}


}
