<?php

class Role extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	/**
	 * Fillable attributes - prevent mass-assignment	
	 *
	 * @var array
	 */
	protected $fillable = array('id', 'name');

	/**
	 * Users - One to many
	 *
	 * @return
	 */
	public function user()
	{
		return $this->hasMany('User');
	}

}