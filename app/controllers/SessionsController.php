<?php



class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::check()) return Redirect::to('/home');
		return View::make('sessions.create', array('main_path' => Config::get('app.main_path')));
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		$validator = Validator::make(Input::all(),['email'=>'required|email', 'password'=>'required|min:6']);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		if(Auth::attempt(Input::only('email','password')))
		{
			return View::make('start', array('main_path' => Config::get('app.main_path')))->withFlashMessage('Login effettuato con successo');
		}
		return Redirect::back()->withInput()->with('errore','Email o Password non valide');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
		Auth::logout();
		return Redirect::to('/');
	}


}
