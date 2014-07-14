<?php

class Login extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'logins';

	/**
	 * Fillable attributes - prevent mass-assignment	
	 *
	 * @var array
	 */
	protected $fillable = array('id', 'created_at');

	/**
	 * Users - One to many
	 *
	 * @return
	 */
	public function user()
	{
		return $this->hasOne('User');
	}

}