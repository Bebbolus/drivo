<?php

class PagesController extends BaseController {
	protected $layout = 'layouts.master';

	public function index()
	{
		return View::make('start', array('main_path' => Config::get('app.main_path')));
	}
	
	public function admin()
	{
		return 'sorry, this page is not enabled at this time. Return back to <a href="home">Home</a>';
	}

}