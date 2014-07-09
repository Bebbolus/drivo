<?php

class Address extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'addresses';
	protected $fillable = [
							'address',
							'city',
							'province',
							'state',
							'zip',
							'id_school'
						   ];

	public function school()
    {
        return $this->belongsTo('Schools', 'id_school', 'id');
    }
}
