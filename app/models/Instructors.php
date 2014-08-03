<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Instructors extends Eloquent {

	/**
	 * The database table instructors by the model.
	 *
	 * @var string
	 */
	protected $table = 'instructors';
	protected $fillable = [
					'name',
					'surname',
					'fiscal_code',
					'date_of_birth',
					'address',
					'city',
					'province',
					'state',
					'zip',
					'phone',
					'mobile_phone',
					'email',
					'id_school'
						   ];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function school()
    {
        return $this->belongsTo('School', 'id_school', 'id');
    }
}
