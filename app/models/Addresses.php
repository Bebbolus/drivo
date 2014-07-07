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
							'zip'
						   ];

	public function user()
    {
        return $this->belongsTo('Schools');
    }
}
