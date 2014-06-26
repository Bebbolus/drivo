<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Teraining extends Eloquent {

	protected $table = 'trainings';
	protected $fillable = ['start_at', 'end_at'];
	
	
	
	public function getDates()
	{
		return ['created_at', 'updated_at', 'start_at', 'end_at'];
	}

}
