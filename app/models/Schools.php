<?php

class School extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'schools';
	protected $fillable = [
							'name',
							'email',
							'phone',
							'fax',
							'id_consortium',
							'id_address'
						   ];
						   
						   
	public function address()
    {
        return $this->hasMany('Addresses', 'id', 'id_address');
    }
}
